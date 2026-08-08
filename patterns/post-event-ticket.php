<?php
/**
 * Title: Praktische informatie (datum, tijd, locatie)
 * Slug: soli-gutenberg-theme/post-event-ticket
 * Categories: soli
 * Description: Ticketachtige strook met datum, tijd en locatie, bedoeld als eerste blok van een aankondiging (overlapt de koptekst).
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:columns {"className":"soli-ticket-strip"} -->
<div class="wp-block-columns soli-ticket-strip">
	<!-- wp:column {"className":"soli-fact"} -->
	<div class="wp-block-column soli-fact">
		<!-- wp:paragraph {"className":"soli-fact-label"} -->
		<p class="soli-fact-label"><?php esc_html_e( 'Datum', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"soli-fact-value"} -->
		<p class="soli-fact-value"><?php esc_html_e( 'Zondag 14 september', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"className":"soli-fact"} -->
	<div class="wp-block-column soli-fact">
		<!-- wp:paragraph {"className":"soli-fact-label"} -->
		<p class="soli-fact-label"><?php esc_html_e( 'Tijd', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"soli-fact-value"} -->
		<p class="soli-fact-value"><?php esc_html_e( '11:00-14:00 uur', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"className":"soli-fact"} -->
	<div class="wp-block-column soli-fact">
		<!-- wp:paragraph {"className":"soli-fact-label"} -->
		<p class="soli-fact-label"><?php esc_html_e( 'Locatie', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"soli-fact-value"} -->
		<p class="soli-fact-value"><?php esc_html_e( 'Kerkpad 83, Driehuis', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"className":"soli-fact-note"} -->
		<p class="soli-fact-note"><?php esc_html_e( 'naast de zuidkant van station Driehuis', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
