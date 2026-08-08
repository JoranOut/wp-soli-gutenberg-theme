<?php
/**
 * Soli Gutenberg Theme functions and definitions.
 *
 * @package Soli_Gutenberg_Theme
 * @since 0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Theme version constant.
 *
 * @since 0.1.0
 */
define( 'SOLI_GUTENBERG_THEME__VERSION', '0.1.0' );

require_once get_template_directory() . '/includes/class-content-manifest.php';
require_once get_template_directory() . '/includes/class-site-initializer.php';
require_once get_template_directory() . '/includes/class-setup-screen.php';

\Soli\GutenbergTheme\Setup_Screen::register();

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	require_once get_template_directory() . '/includes/class-cli.php';
	\Soli\GutenbergTheme\CLI::register();
}

/**
 * Theme setup.
 *
 * @since 0.1.0
 */
function soli_gutenberg_theme_setup(): void {
	load_theme_textdomain( 'soli-gutenberg-theme', get_template_directory() . '/languages' );

	// Editor stylesheet so the editor canvas matches the front end.
	add_editor_style( 'assets/css/soli.css' );
}
add_action( 'after_setup_theme', 'soli_gutenberg_theme_setup' );

/**
 * Give the post (news) block editor a paper writing canvas.
 *
 * Editor-only and scoped to the "post" post-type editor screen, so pages, the
 * Site Editor and the front end are untouched. Registered on current_screen so
 * the extra editor stylesheet is only added for the relevant screen.
 *
 * @since 0.1.0
 *
 * @param WP_Screen $screen Current admin screen.
 */
function soli_gutenberg_theme_post_editor_style( WP_Screen $screen ): void {
	if ( 'post' === $screen->base && 'post' === $screen->post_type ) {
		add_editor_style( 'assets/css/editor-post.css' );
	}
}
add_action( 'current_screen', 'soli_gutenberg_theme_post_editor_style' );

/**
 * Fix Query Loop pagination when the block sets an "offset".
 *
 * Core mis-computes the SQL offset for offset queries on paged requests, so
 * page 2 overlaps page 1 (WordPress core bug). Recompute the absolute offset
 * as (perPage × (page − 1)) + the block's own offset. Scoped to blocks that
 * actually declare an offset so ordinary queries are untouched.
 *
 * @since 0.1.0
 *
 * @param array    $query The compiled WP_Query args.
 * @param WP_Block $block The block instance.
 * @param int      $page  The current page number.
 * @return array The adjusted query args.
 */
function soli_gutenberg_theme_fix_query_offset( array $query, WP_Block $block, int $page ): array {
	$context = $block->context['query'] ?? array();
	$offset  = isset( $context['offset'] ) ? (int) $context['offset'] : 0;

	if ( $offset > 0 ) {
		$per_page         = isset( $context['perPage'] ) ? (int) $context['perPage'] : (int) get_option( 'posts_per_page' );
		$query['offset']  = ( $per_page * ( $page - 1 ) ) + $offset;
	}

	return $query;
}
add_filter( 'query_loop_block_query_vars', 'soli_gutenberg_theme_fix_query_offset', 10, 3 );

/**
 * Enqueue theme styles.
 *
 * @since 0.1.0
 */
function soli_gutenberg_theme_enqueue_styles(): void {
	$version = SOLI_GUTENBERG_THEME__VERSION;

	// In development, cache-bust on every file change.
	if ( 'theme' === wp_get_development_mode() ) {
		$version = (string) filemtime( get_theme_file_path( 'assets/css/soli.css' ) );
	}

	wp_enqueue_style(
		'soli-gutenberg-theme',
		get_theme_file_uri( 'assets/css/soli.css' ),
		array(),
		$version
	);

	// Playful musical-note click burst (see assets/js/soli-notes.js).
	$notes_version = SOLI_GUTENBERG_THEME__VERSION;
	if ( 'theme' === wp_get_development_mode() ) {
		$notes_version = (string) filemtime( get_theme_file_path( 'assets/js/soli-notes.js' ) );
	}

	wp_enqueue_script(
		'soli-notes',
		get_theme_file_uri( 'assets/js/soli-notes.js' ),
		array(),
		$notes_version,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'soli_gutenberg_theme_enqueue_styles' );

/**
 * Match the post editor's writing width to the front end.
 *
 * On the front end the single template places post content in a ~736px column
 * beside the 280px sidebar, while the editor canvas otherwise uses the 1100px
 * content size. This injects an editor-only style that caps the writing column
 * to the same width. Scoped to the post editor (via the editor context's post
 * type) so pages and the site/template editor keep their own widths. Added
 * through block_editor_settings_all — rather than the shared editor stylesheet —
 * so it loads after the theme.json global styles and reliably wins the cascade.
 *
 * @param array                    $settings Block editor settings.
 * @param WP_Block_Editor_Context  $context  Current editor context.
 * @return array Filtered settings.
 */
function soli_gutenberg_theme_editor_content_width( array $settings, $context ): array {
	if ( empty( $context->post ) || ! ( $context->post instanceof WP_Post ) || 'post' !== $context->post->post_type ) {
		return $settings;
	}

	$settings['styles'][] = array(
		'css' => '.is-root-container{--wp--style--global--content-size:736px;}'
			. '.is-root-container > :not(.alignfull):not(.alignwide){max-width:736px;margin-left:auto;margin-right:auto;}',
	);

	return $settings;
}
add_filter( 'block_editor_settings_all', 'soli_gutenberg_theme_editor_content_width', 10, 2 );

/**
 * Register theme-bundled blocks from the build manifest (WP 6.8 API).
 *
 * @since 0.1.0
 */
function soli_gutenberg_theme_register_blocks(): void {
	$manifest = get_theme_file_path( 'build/blocks-manifest.php' );

	if ( file_exists( $manifest ) && function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
		wp_register_block_types_from_metadata_collection(
			get_theme_file_path( 'build/blocks' ),
			$manifest
		);
	}
}
add_action( 'init', 'soli_gutenberg_theme_register_blocks' );

/**
 * Register block style variations.
 *
 * @since 0.1.0
 */
function soli_gutenberg_theme_register_block_styles(): void {
	// Outline button: transparent with maroon border.
	register_block_style(
		'core/button',
		array(
			'name'       => 'outline-maroon',
			'label'      => __( 'Outline', 'soli-gutenberg-theme' ),
			'style_data' => array(
				'color'  => array(
					'background' => 'transparent',
					'text'       => 'var:preset|color|maroon',
				),
				'border' => array(
					'color' => 'var:preset|color|maroon',
					'width' => '1px',
					'style' => 'solid',
				),
			),
		)
	);

	// Gold call-to-action button.
	register_block_style(
		'core/button',
		array(
			'name'       => 'gold-cta',
			'label'      => __( 'Gold CTA', 'soli-gutenberg-theme' ),
			'style_data' => array(
				'color' => array(
					'background' => 'var:preset|color|gold',
					'text'       => 'var:preset|color|ink',
				),
			),
		)
	);

	// Soli card: white surface with the signature asymmetric corner radius.
	register_block_style(
		'core/group',
		array(
			'name'       => 'soli-card',
			'label'      => __( 'Soli card', 'soli-gutenberg-theme' ),
			'style_data' => array(
				'color'   => array(
					'background' => 'var:preset|color|white',
				),
				'border'  => array(
					'color'  => 'var:preset|color|line',
					'width'  => '1px',
					'style'  => 'solid',
					'radius' => 'var(--wp--custom--card-radius)',
				),
				'shadow'  => 'var(--wp--custom--shadow--card)',
				'spacing' => array(
					'padding' => array(
						'top'    => 'var:preset|spacing|40',
						'right'  => 'var:preset|spacing|40',
						'bottom' => 'var:preset|spacing|40',
						'left'   => 'var:preset|spacing|40',
					),
				),
			),
		)
	);

	// Soli panel: like the card, but with a maroon title bar (see .is-style-soli-panel
	// in soli.css). Padding is dropped here so the header band can run full-bleed.
	// Flat (border only, no drop shadow) to match the mockup's index/aside cards.
	register_block_style(
		'core/group',
		array(
			'name'       => 'soli-panel',
			'label'      => __( 'Soli panel', 'soli-gutenberg-theme' ),
			'style_data' => array(
				'color'   => array(
					'background' => 'var:preset|color|white',
				),
				'border'  => array(
					'color'  => 'var:preset|color|line',
					'width'  => '1px',
					'style'  => 'solid',
					'radius' => 'var(--wp--custom--card-radius)',
				),
				'spacing' => array(
					'padding' => array(
						'top'    => '0',
						'right'  => '0',
						'bottom' => '0',
						'left'   => '0',
					),
				),
			),
		)
	);

	// Placeholder card: dashed outline for not-yet-available plugin features.
	register_block_style(
		'core/group',
		array(
			'name'       => 'soli-placeholder',
			'label'      => __( 'Placeholder', 'soli-gutenberg-theme' ),
			'style_data' => array(
				'color'  => array(
					'background' => 'var:preset|color|paper',
					'text'       => 'var:preset|color|muted',
				),
				'border' => array(
					'color'  => 'var:preset|color|sand',
					'width'  => '2px',
					'style'  => 'dashed',
					'radius' => 'var(--wp--custom--card-radius)',
				),
			),
		)
	);

	// Soli quote: gold left rule with an italic display pull-quote (styled in
	// soli.css — a left-only border + font change can't be expressed as style_data).
	register_block_style(
		'core/quote',
		array(
			'name'  => 'soli-quote',
			'label' => __( 'Soli citaat', 'soli-gutenberg-theme' ),
		)
	);
}
add_action( 'init', 'soli_gutenberg_theme_register_block_styles' );

/**
 * Register the Soli pattern category.
 *
 * @since 0.1.0
 */
function soli_gutenberg_theme_register_pattern_category(): void {
	register_block_pattern_category(
		'soli',
		array(
			'label'       => __( 'Soli', 'soli-gutenberg-theme' ),
			'description' => __( 'Patterns for the Soli website.', 'soli-gutenberg-theme' ),
		)
	);
}
add_action( 'init', 'soli_gutenberg_theme_register_pattern_category' );

/**
 * Initialize GitHub theme updater.
 *
 * @since 0.1.0
 */
function soli_gutenberg_theme_github_updater(): void {
	include_once get_template_directory() . '/updater.php';

	if ( class_exists( 'Soli\GutenbergTheme\WP_GitHub_Theme_Updater' ) ) {
		$config = array(
			'slug'         => 'wp-soli-gutenberg-theme',
			'api_url'      => 'https://api.github.com/repos/JoranOut/wp-soli-gutenberg-theme',
			'raw_url'      => 'https://raw.githubusercontent.com/JoranOut/wp-soli-gutenberg-theme/main',
			'github_url'   => 'https://github.com/JoranOut/wp-soli-gutenberg-theme',
			'zip_url'      => 'https://github.com/JoranOut/wp-soli-gutenberg-theme/releases/latest/download/wp-soli-gutenberg-theme.zip',
			'requires'     => '6.8.0',
			'tested'       => '6.8.0',
			'requires_php' => '8.2',
			'readme'       => 'README.md',
		);

		new \Soli\GutenbergTheme\WP_GitHub_Theme_Updater( $config );
	}
}
add_action( 'init', 'soli_gutenberg_theme_github_updater' );
