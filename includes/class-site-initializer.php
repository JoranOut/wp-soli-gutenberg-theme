<?php
/**
 * Creates the Soli site structure from the content manifest.
 *
 * Idempotent throughout: every page and post is matched by slug first, so
 * re-running only fills gaps and never duplicates or overwrites edited content.
 *
 * Capability checks live in the caller (Setup_Screen), not here, so the same
 * code path is reusable from WP-CLI where there is no current user.
 *
 * @package Soli_Gutenberg_Theme
 * @since 0.1.0
 */

namespace Soli\GutenbergTheme;

defined( 'ABSPATH' ) || exit;

/**
 * Site structure installer.
 *
 * @since 0.1.0
 */
final class Site_Initializer {

	/**
	 * Create the page structure: pages, hierarchy, templates, front/posts page.
	 *
	 * Deliberately excludes demo photos and news posts — this runs on real sites.
	 *
	 * @return array{created: string[], skipped: string[]} Report.
	 */
	public static function init_pages(): array {
		$report = array(
			'created' => array(),
			'skipped' => array(),
		);

		$ids = array();

		foreach ( Content_Manifest::pages() as $page ) {
			$parent = ( '' !== $page['parent'] && isset( $ids[ $page['parent'] ] ) )
				? $ids[ $page['parent'] ]
				: 0;

			$result = self::ensure_page(
				$page['slug'],
				$page['title'],
				$page['content'],
				$parent,
				$page['template']
			);

			$ids[ $page['slug'] ] = $result['id'];
			$report[ $result['created'] ? 'created' : 'skipped' ][] = $page['slug'];
		}

		// Group pages hang under the orchestras overview.
		$orkesten  = $ids['orkesten-en-groepen'] ?? 0;
		$group_ids = array();

		foreach ( Content_Manifest::groups() as $group ) {
			$result = self::ensure_page(
				$group['slug'],
				$group['title'],
				Content_Manifest::pattern( 'page-group-' . $group['slug'] ),
				$orkesten,
				'page-group'
			);

			$group_ids[ $group['slug'] ] = $result['id'];
			$report[ $result['created'] ? 'created' : 'skipped' ][] = $group['slug'];
		}

		// Home last: the slider bakes in the group page IDs resolved above.
		$home = self::ensure_page(
			'home',
			'Home',
			Content_Manifest::home_content( $group_ids ),
			0,
			''
		);
		$report[ $home['created'] ? 'created' : 'skipped' ][] = 'home';

		if ( $home['id'] > 0 ) {
			update_option( 'show_on_front', 'page' );
			update_option( 'page_on_front', $home['id'] );
		}
		if ( ! empty( $ids['nieuws'] ) ) {
			update_option( 'page_for_posts', $ids['nieuws'] );
		}

		return $report;
	}

	/**
	 * Seed the demo content: group photos, group excerpts and the news archive.
	 *
	 * Local/demo only — this puts mockup news and stock photography on the site.
	 *
	 * @return array{created: string[], skipped: string[]} Report.
	 */
	public static function seed_demo_content(): array {
		$report = array(
			'created' => array(),
			'skipped' => array(),
		);

		foreach ( Content_Manifest::groups() as $group ) {
			// Slug lookup, not get_page_by_path(): group pages are children of
			// orkesten-en-groepen, so their path is never the bare slug.
			$page_id = self::find_by_slug( $group['slug'], 'page' );
			if ( 0 === $page_id ) {
				$report['skipped'][] = $group['slug'] . ' (pagina bestaat nog niet)';
				continue;
			}

			$page = get_post( $page_id );

			if ( self::set_featured( $page->ID, $group['image'] ) ) {
				$report['created'][] = $group['slug'] . ' (afbeelding)';
			} else {
				$report['skipped'][] = $group['slug'] . ' (afbeelding)';
			}

			if ( ! empty( $group['excerpt'] ) && '' === $page->post_excerpt ) {
				wp_update_post(
					array(
						'ID'           => $page->ID,
						'post_excerpt' => $group['excerpt'],
					)
				);
			}
		}

		foreach ( Content_Manifest::news_posts() as $post ) {
			$result = self::ensure_post( $post );
			$report[ $result['created'] ? 'created' : 'skipped' ][] = $post['slug'];

			if ( $result['id'] > 0 && ! empty( $post['image'] ) ) {
				self::set_featured( $result['id'], $post['image'] );
			}
		}

		// Retire the WordPress sample post so the news index shows only Soli items.
		$hello = self::find_by_slug( 'hello-world', 'post' );
		if ( $hello > 0 ) {
			wp_delete_post( $hello, true );
			$report['created'][] = 'hello-world verwijderd';
		}

		return $report;
	}

	/**
	 * Create a page once, matched by slug.
	 *
	 * @param string $slug     Page slug.
	 * @param string $title    Page title.
	 * @param string $content  Block markup.
	 * @param int    $parent   Parent page ID, 0 for top level.
	 * @param string $template Block template slug from theme.json customTemplates.
	 * @return array{id: int, created: bool} The page ID and whether it was just created.
	 */
	private static function ensure_page( string $slug, string $title, string $content, int $parent, string $template ): array {
		$existing = self::find_by_slug( $slug, 'page' );

		if ( $existing > 0 ) {
			return array(
				'id'      => $existing,
				'created' => false,
			);
		}

		// wp_insert_post() expects slashed data and unslashes it internally.
		$id = wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_status'  => 'publish',
				'post_name'    => $slug,
				'post_title'   => $title,
				'post_parent'  => $parent,
				'post_content' => wp_slash( $content ),
			),
			true
		);

		if ( is_wp_error( $id ) ) {
			return array(
				'id'      => 0,
				'created' => false,
			);
		}

		if ( '' !== $template ) {
			update_post_meta( $id, '_wp_page_template', $template );
		}

		return array(
			'id'      => (int) $id,
			'created' => true,
		);
	}

	/**
	 * Create a news post once, matched by slug.
	 *
	 * @param array<string, string> $post Post definition from the manifest.
	 * @return array{id: int, created: bool} The post ID and whether it was just created.
	 */
	private static function ensure_post( array $post ): array {
		$existing = self::find_by_slug( $post['slug'], 'post' );

		if ( $existing > 0 ) {
			return array(
				'id'      => $existing,
				'created' => false,
			);
		}

		$id = wp_insert_post(
			array(
				'post_type'    => 'post',
				'post_status'  => 'publish',
				'post_name'    => $post['slug'],
				'post_title'   => $post['title'],
				'post_date'    => $post['date'],
				'post_excerpt' => wp_slash( $post['excerpt'] ),
				'post_content' => wp_slash( $post['content'] ),
			),
			true
		);

		if ( is_wp_error( $id ) ) {
			return array(
				'id'      => 0,
				'created' => false,
			);
		}

		if ( ! empty( $post['template'] ) ) {
			update_post_meta( $id, '_wp_page_template', $post['template'] );
		}

		return array(
			'id'      => (int) $id,
			'created' => true,
		);
	}

	/**
	 * Find a post of any status by its exact slug.
	 *
	 * Slug lookup rather than get_page_by_path(), which matches the full
	 * hierarchical path and therefore misses every child page.
	 *
	 * @param string $slug      Post slug.
	 * @param string $post_type Post type.
	 * @return int Post ID, or 0 when not found.
	 */
	private static function find_by_slug( string $slug, string $post_type ): int {
		$found = get_posts(
			array(
				'post_type'        => $post_type,
				'name'             => $slug,
				'post_status'      => 'any',
				'numberposts'      => 1,
				'fields'           => 'ids',
				'suppress_filters' => false,
			)
		);

		return empty( $found ) ? 0 : (int) $found[0];
	}

	/**
	 * Attach a demo photo from the theme as the featured image, once.
	 *
	 * @param int    $post_id Target post or page.
	 * @param string $image   Path relative to assets/images/demo/.
	 * @return bool True when an image was imported, false when skipped or missing.
	 */
	private static function set_featured( int $post_id, string $image ): bool {
		$existing = (int) get_post_thumbnail_id( $post_id );

		if ( $existing ) {
			$file = get_attached_file( $existing );

			if ( $file && file_exists( $file ) ) {
				return false;
			}

			/*
			 * Dangling thumbnail: the attachment row outlived its file, which is
			 * what happens when wp-content/uploads is wiped while the database
			 * volume survives. Without this the seeder reports "overgeslagen"
			 * forever and every featured image keeps 404ing.
			 */
			wp_delete_attachment( $existing, true );
			delete_post_thumbnail( $post_id );
		}

		$source = get_theme_file_path( 'assets/images/demo/' . $image );
		if ( ! file_exists( $source ) ) {
			return false;
		}

		require_once ABSPATH . 'wp-admin/includes/file.php';
		require_once ABSPATH . 'wp-admin/includes/media.php';
		require_once ABSPATH . 'wp-admin/includes/image.php';

		$tmp = wp_tempnam( basename( $source ) );
		if ( ! $tmp || ! copy( $source, $tmp ) ) {
			return false;
		}

		$attachment_id = media_handle_sideload(
			array(
				'name'     => basename( $source ),
				'tmp_name' => $tmp,
			),
			$post_id
		);

		if ( is_wp_error( $attachment_id ) ) {
			// media_handle_sideload() only removes the temp file on success.
			if ( file_exists( $tmp ) ) {
				wp_delete_file( $tmp );
			}
			return false;
		}

		set_post_thumbnail( $post_id, $attachment_id );

		return true;
	}
}
