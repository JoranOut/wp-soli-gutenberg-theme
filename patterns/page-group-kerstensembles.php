<?php
/**
 * Title: Groepspagina: Kerstensembles
 * Slug: soli-gutenberg-theme/page-group-kerstensembles
 * Categories: soli
 * Description: Volledige inhoud voor de Kerstensembles-pagina (tekst, foto en zijbalk met boekingsgegevens). Gebruik het Groepspagina-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"className":"soli-fb-main"} -->
	<div class="wp-block-column soli-fb-main">
		<!-- wp:paragraph {"className":"soli-page-lede"} -->
		<p class="soli-page-lede">Tijdens de kerstdagen is Soli overal te vinden. De hele vereniging komt in feeststemming &mdash; en dat hoor je.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Op kerstavond spelen twee gelegenheidsorkesten van Soli op verschillende plekken, de harmonie speelt geregeld in Heliomare, en de Funband heeft een eigen kerstrepertoire. Voor de opluistering van een kerstfeest of gewoon wat extra kerstsfeer helpt Soli graag.</p>
		<!-- /wp:paragraph -->

		<!-- wp:image {"sizeSlug":"large","className":"soli-card-media","style":{"spacing":{"margin":{"top":"2rem"}}}} -->
		<figure class="wp-block-image size-large soli-card-media" style="margin-top:2rem"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/groepen/kerst.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Een kerstensemble van Soli speelt in kerstsfeer', 'soli-gutenberg-theme' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Soli in kerstsfeer.', 'soli-gutenberg-theme' ); ?></figcaption></figure>
		<!-- /wp:image -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":"330px","className":"soli-fb-aside"} -->
	<div class="wp-block-column soli-fb-aside" style="flex-basis:330px">
		<!-- wp:group {"layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
		<div class="wp-block-group">
			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Praktisch', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:group {"className":"soli-fact-list","layout":{"type":"default"},"style":{"spacing":{"blockGap":"1rem"}}} -->
				<div class="wp-block-group soli-fact-list">
					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Seizoen', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'rond de kerstdagen', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Bezetting', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'op maat, passend bij uw evenement', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Boeken & contact', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'Neem contact op met ons secretariaat: samen kijken we wat het beste past bij uw evenement.', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Secretariaat', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><a href="mailto:secretariaat@soli.nl">secretariaat@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

<?php
			$soli_kerst_cta = array(
				'buttonText'  => __( 'Boek een kerstensemble →', 'soli-gutenberg-theme' ),
				'dialogTitle' => __( 'Boek een kerstensemble', 'soli-gutenberg-theme' ),
				'to'          => 'secretariaat@soli.nl',
				'subject'     => __( 'Boekingsaanvraag kerstensemble', 'soli-gutenberg-theme' ),
				'body'        => __(
					"Beste Soli,\n\nGraag zou ik een kerstensemble willen boeken.\n\nGelegenheid:\nDatum:\nLocatie:\n\nMet vriendelijke groet,",
					'soli-gutenberg-theme'
				),
			);
			?>
				<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_kerst_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
