<?php
/**
 * Title: Groepspagina inhoud
 * Slug: soli-gutenberg-theme/page-group
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor een orkest- of groepspagina (gebruik het Groepspagina-sjabloon): tekst met zijbalk.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"width":"62%"} -->
	<div class="wp-block-column" style="flex-basis:62%">
		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size">Deze groep is een van de ensembles van Soli en bestaat uit enthousiaste muzikanten uit de vereniging.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Vertel hier over het repertoire, de sfeer en de optredens van de groep. Vervang deze tekst door het echte verhaal.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>De groep repeteert wekelijks — kom gerust eens langs bij een repetitie.</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"is-style-soli-card","backgroundColor":"paper","layout":{"type":"default"}} -->
		<div class="wp-block-group is-style-soli-card has-paper-background-color has-background">
			<!-- wp:paragraph {"className":"soli-eyebrow"} -->
			<p class="soli-eyebrow"><?php esc_html_e( 'Meespelen?', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'Er is nog plek voor nieuwe muzikanten. Kom gerust eens langs bij een repetitie.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column -->
	<div class="wp-block-column">
		<!-- wp:pattern {"slug":"soli-gutenberg-theme/group-detail-aside"} /-->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
