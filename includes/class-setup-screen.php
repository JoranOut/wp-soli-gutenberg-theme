<?php
/**
 * Appearance → Soli setup: run the site initializer from wp-admin.
 *
 * Exists so the page structure can be installed on a real host (dev.soli.nl,
 * production) where bin/setup.sh — which drives the local wp-env containers —
 * cannot reach.
 *
 * @package Soli_Gutenberg_Theme
 * @since 0.1.0
 */

namespace Soli\GutenbergTheme;

defined( 'ABSPATH' ) || exit;

/**
 * Admin screen for initializing site content.
 *
 * @since 0.1.0
 */
final class Setup_Screen {

	/**
	 * Menu/page slug.
	 */
	private const SLUG = 'soli-setup';

	/**
	 * Capability required to run the initializer.
	 */
	private const CAPABILITY = 'edit_theme_options';

	/**
	 * Hook the screen into wp-admin.
	 *
	 * @return void
	 */
	public static function register(): void {
		add_action( 'admin_menu', array( self::class, 'add_page' ) );
	}

	/**
	 * Register the Appearance submenu entry.
	 *
	 * @return void
	 */
	public static function add_page(): void {
		add_theme_page(
			__( 'Soli setup', 'soli-gutenberg-theme' ),
			__( 'Soli setup', 'soli-gutenberg-theme' ),
			self::CAPABILITY,
			self::SLUG,
			array( self::class, 'render' )
		);
	}

	/**
	 * Render the screen and handle submissions.
	 *
	 * @return void
	 */
	public static function render(): void {
		if ( ! current_user_can( self::CAPABILITY ) ) {
			wp_die( esc_html__( 'Je hebt geen rechten om deze pagina te openen.', 'soli-gutenberg-theme' ) );
		}

		$report = null;

		if ( isset( $_POST['soli_action'] ) ) {
			check_admin_referer( 'soli_setup' );

			$action = sanitize_key( wp_unslash( $_POST['soli_action'] ) );

			if ( 'pages' === $action ) {
				$report = Site_Initializer::init_pages();
			} elseif ( 'demo' === $action ) {
				$report = Site_Initializer::seed_demo_content();
			}
		}

		$total    = count( Content_Manifest::pages() ) + count( Content_Manifest::groups() ) + 1;
		$existing = self::count_existing_pages();
		?>
		<div class="wrap">
			<h1><?php esc_html_e( 'Soli setup', 'soli-gutenberg-theme' ); ?></h1>

			<p>
				<?php
				printf(
					/* translators: 1: number of pages present, 2: total pages in the manifest. */
					esc_html__( '%1$d van de %2$d pagina\'s uit het thema bestaat al.', 'soli-gutenberg-theme' ),
					(int) $existing,
					(int) $total
				);
				?>
			</p>

			<?php if ( is_array( $report ) ) : ?>
				<?php self::render_report( $report ); ?>
			<?php endif; ?>

			<div class="card">
				<h2><?php esc_html_e( 'Paginastructuur', 'soli-gutenberg-theme' ); ?></h2>
				<p>
					<?php esc_html_e( 'Maakt alle pagina\'s aan met de juiste hiërarchie, paginasjablonen en startinhoud uit de thema-patronen, en zet de voorpagina en berichtenpagina goed. Bestaande pagina\'s worden overgeslagen — herhaald uitvoeren is veilig en overschrijft niets.', 'soli-gutenberg-theme' ); ?>
				</p>
				<form method="post">
					<?php wp_nonce_field( 'soli_setup' ); ?>
					<input type="hidden" name="soli_action" value="pages" />
					<?php submit_button( __( 'Paginastructuur aanmaken', 'soli-gutenberg-theme' ), 'primary', 'submit', false ); ?>
				</form>
			</div>

			<div class="card">
				<h2><?php esc_html_e( 'Demo-inhoud', 'soli-gutenberg-theme' ); ?></h2>
				<p>
					<?php esc_html_e( 'Alleen voor ontwikkel- en testomgevingen: zet demofoto\'s op de groepspagina\'s en voegt de nieuwsberichten uit de mockup toe. Verwijdert ook het standaard "Hallo wereld!"-bericht van WordPress. Gebruik dit niet op de productiesite.', 'soli-gutenberg-theme' ); ?>
				</p>
				<form method="post">
					<?php wp_nonce_field( 'soli_setup' ); ?>
					<input type="hidden" name="soli_action" value="demo" />
					<?php submit_button( __( 'Demo-inhoud toevoegen', 'soli-gutenberg-theme' ), 'secondary', 'submit', false ); ?>
				</form>
			</div>
		</div>
		<?php
	}

	/**
	 * Print the result of a run.
	 *
	 * @param array{created: string[], skipped: string[]} $report Run report.
	 * @return void
	 */
	private static function render_report( array $report ): void {
		?>
		<div class="notice notice-success">
			<p>
				<?php
				printf(
					/* translators: 1: number created, 2: number skipped. */
					esc_html__( 'Klaar: %1$d aangemaakt, %2$d overgeslagen (bestond al).', 'soli-gutenberg-theme' ),
					count( $report['created'] ),
					count( $report['skipped'] )
				);
				?>
			</p>
			<?php if ( ! empty( $report['created'] ) ) : ?>
				<p><?php echo esc_html( implode( ', ', $report['created'] ) ); ?></p>
			<?php endif; ?>
		</div>
		<?php
	}

	/**
	 * How many manifest pages already exist.
	 *
	 * @return int Count.
	 */
	private static function count_existing_pages(): int {
		$slugs = array( 'home' );

		foreach ( Content_Manifest::pages() as $page ) {
			$slugs[] = $page['slug'];
		}
		foreach ( Content_Manifest::groups() as $group ) {
			$slugs[] = $group['slug'];
		}

		$found = get_posts(
			array(
				'post_type'        => 'page',
				'post_status'      => 'any',
				'post_name__in'    => $slugs,
				'numberposts'      => count( $slugs ),
				'fields'           => 'ids',
				'suppress_filters' => false,
			)
		);

		return count( $found );
	}
}
