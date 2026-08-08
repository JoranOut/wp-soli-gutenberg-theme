<?php
/**
 * Title: Programma in twee kolommen
 * Slug: soli-gutenberg-theme/post-program-columns
 * Categories: soli
 * Description: Twee naast elkaar geplaatste programmakaarten met tijdstippen, voor een aankondiging met meerdere onderdelen.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:columns {"className":"soli-program-columns"} -->
<div class="wp-block-columns soli-program-columns">
	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:group {"className":"soli-program-card","layout":{"type":"default"}} -->
		<div class="wp-block-group soli-program-card">
			<!-- wp:heading {"level":2} -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Bij Soli', 'soli-gutenberg-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:group {"className":"soli-program-rows","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
			<div class="wp-block-group soli-program-rows">
				<!-- wp:paragraph {"className":"soli-program-rows__item"} -->
				<p class="soli-program-rows__item"><strong><?php esc_html_e( '11:00-14:00', 'soli-gutenberg-theme' ); ?></strong><?php esc_html_e( 'Probeer zelf blaas- en slaginstrumenten uit, met hulp van Soli-leden', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"soli-program-rows__item"} -->
				<p class="soli-program-rows__item"><strong><?php esc_html_e( 'doorlopend', 'soli-gutenberg-theme' ); ?></strong><?php esc_html_e( 'Twirl-demonstraties van het TwirlTeam', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"soli-program-rows__item"} -->
				<p class="soli-program-rows__item"><strong><?php esc_html_e( 'voor kinderen', 'soli-gutenberg-theme' ); ?></strong><?php esc_html_e( 'Speurtocht door het Muziekcentrum', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"soli-program-note"} -->
			<p class="soli-program-note"><?php esc_html_e( 'Kun je niet op de aangekondigde datum? Het TwirlTeam geeft ook open lessen. Vraag ernaar bij de stand.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:group {"className":"soli-program-card","layout":{"type":"default"}} -->
		<div class="wp-block-group soli-program-card">
			<!-- wp:heading {"level":2} -->
			<h2 class="wp-block-heading"><?php esc_html_e( 'Bij Dansstudio Jolein', 'soli-gutenberg-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:group {"className":"soli-program-rows","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
			<div class="wp-block-group soli-program-rows">
				<!-- wp:paragraph {"className":"soli-program-rows__item"} -->
				<p class="soli-program-rows__item"><strong><?php esc_html_e( '11:00', 'soli-gutenberg-theme' ); ?></strong><?php esc_html_e( 'Inloop', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"soli-program-rows__item"} -->
				<p class="soli-program-rows__item"><strong><?php esc_html_e( '11:15', 'soli-gutenberg-theme' ); ?></strong><?php esc_html_e( 'Ouder- en kinddans (2-3 jaar)', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"soli-program-rows__item"} -->
				<p class="soli-program-rows__item"><strong><?php esc_html_e( '11:45', 'soli-gutenberg-theme' ); ?></strong><?php esc_html_e( 'Dansworkshop (4-6 jaar)', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"soli-program-rows__item"} -->
				<p class="soli-program-rows__item"><strong><?php esc_html_e( '12:00', 'soli-gutenberg-theme' ); ?></strong><?php esc_html_e( 'Optreden', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"soli-program-rows__item"} -->
				<p class="soli-program-rows__item"><strong><?php esc_html_e( '12:30', 'soli-gutenberg-theme' ); ?></strong><?php esc_html_e( 'Streetdance (6-8 jaar)', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"soli-program-rows__item"} -->
				<p class="soli-program-rows__item"><strong><?php esc_html_e( '13:00', 'soli-gutenberg-theme' ); ?></strong><?php esc_html_e( 'Streetdance (8+)', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"soli-program-rows__item"} -->
				<p class="soli-program-rows__item"><strong><?php esc_html_e( '13:20', 'soli-gutenberg-theme' ); ?></strong><?php esc_html_e( 'Optreden', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
