<?php
/**
 * Title: Groepsdetail zijbalk
 * Slug: soli-gutenberg-theme/group-detail-aside
 * Categories: soli
 * Description: “Praktisch” en “Boeken & contact” kaarten voor een groepspagina.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
<div class="wp-block-group">
	<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group is-style-soli-panel">
		<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} -->
		<h3 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Praktisch', 'soli-gutenberg-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:group {"className":"soli-fact-list","layout":{"type":"default"},"style":{"spacing":{"blockGap":"1rem"}}} -->
		<div class="wp-block-group soli-fact-list">
			<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
			<div class="wp-block-group soli-fact">
				<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Opgericht', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">2015</p><!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
			<div class="wp-block-group soli-fact">
				<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Bezetting', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( '± 15 muzikanten', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
			<div class="wp-block-group soli-fact">
				<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Repetitie', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
				<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'eens per drie weken, vrij/za 19.30–22.00 uur', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group is-style-soli-panel">
		<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} -->
		<h3 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Boeken & contact', 'soli-gutenberg-theme' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( 'Deze groep is te boeken voor elke muzikale gelegenheid.', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
		<div class="wp-block-group soli-fact">
			<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Contactpersoon', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Naam<br><a href="mailto:info@soli.nl">info@soli.nl</a></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="mailto:info@soli.nl"><?php esc_html_e( 'Boek deze groep →', 'soli-gutenberg-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
