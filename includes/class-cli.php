<?php
/**
 * WP-CLI commands for the site initializer.
 *
 * Used by bin/setup.sh for local seeding, and available over SSH on hosts that
 * offer WP-CLI. Wraps the same Site_Initializer the wp-admin screen calls, so
 * the three entry points cannot drift.
 *
 * @package Soli_Gutenberg_Theme
 * @since 0.1.0
 */

namespace Soli\GutenbergTheme;

defined( 'ABSPATH' ) || exit;

/**
 * `wp soli …` commands.
 *
 * @since 0.1.0
 */
final class CLI {

	/**
	 * Register the commands with WP-CLI.
	 *
	 * @return void
	 */
	public static function register(): void {
		\WP_CLI::add_command( 'soli init-pages', array( self::class, 'init_pages' ) );
		\WP_CLI::add_command( 'soli seed-demo', array( self::class, 'seed_demo' ) );
	}

	/**
	 * Create the page structure.
	 *
	 * ## EXAMPLES
	 *
	 *     wp soli init-pages
	 *
	 * @return void
	 */
	public static function init_pages(): void {
		self::report( Site_Initializer::init_pages(), 'Paginastructuur' );
	}

	/**
	 * Seed demo photos and news posts. Development environments only.
	 *
	 * ## EXAMPLES
	 *
	 *     wp soli seed-demo
	 *
	 * @return void
	 */
	public static function seed_demo(): void {
		self::report( Site_Initializer::seed_demo_content(), 'Demo-inhoud' );
	}

	/**
	 * Print a run report.
	 *
	 * @param array{created: string[], skipped: string[]} $report Run report.
	 * @param string                                      $label  Human label.
	 * @return void
	 */
	private static function report( array $report, string $label ): void {
		\WP_CLI::success(
			sprintf(
				'%s: %d aangemaakt, %d overgeslagen.',
				$label,
				count( $report['created'] ),
				count( $report['skipped'] )
			)
		);
	}
}
