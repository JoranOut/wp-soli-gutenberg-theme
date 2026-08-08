<?php
/**
 * Title: Groepspagina: Blokfluitklas
 * Slug: soli-gutenberg-theme/page-group-blokfluitklas
 * Categories: soli
 * Description: Volledige inhoud voor de Blokfluitklas-pagina (tekst, foto en zijbalk met cursusinfo). Gebruik het Groepspagina-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"className":"soli-fb-main"} -->
	<div class="wp-block-column soli-fb-main">
		<!-- wp:paragraph {"className":"soli-page-lede"} -->
		<p class="soli-page-lede">De blokfluitklas is de eerste stap de muziek in. Kinderen leren er blokfluit spelen en noten lezen &mdash; en vooral: hoe leuk het is om samen muziek te maken.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Onderweg maken ze ook kennis met de andere instrumenten die Soli in huis heeft. Zo ontdekt je kind vanzelf wat het na de blokfluit het liefst wil spelen: een trompet, een klarinet, slagwerk?</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>De lessen worden gegeven door Helen van Wolferen, op donderdag van 18.00 tot 18.30 uur in het Soli Muziekcentrum. De cursus start op 2 oktober 2025 en loopt door tot 22 januari 2026; in de herfst- en kerstvakantie is er geen les.</p>
		<!-- /wp:paragraph -->

		<!-- wp:image {"sizeSlug":"large","className":"soli-card-media","style":{"spacing":{"margin":{"top":"2rem"}}}} -->
		<figure class="wp-block-image size-large soli-card-media" style="margin-top:2rem"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/groepen/blokfluit.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Kinderen van de blokfluitklas tijdens de les', 'soli-gutenberg-theme' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'De blokfluitklas: de eerste noten, samen.', 'soli-gutenberg-theme' ); ?></figcaption></figure>
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
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Docent', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Helen van Wolferen</p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Les', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'donderdag 18.00-18.30 uur, Soli Muziekcentrum', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Cursus', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( '2 oktober 2025 t/m 22 januari 2026 (niet in de schoolvakanties)', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Kosten', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( '€ 90,00 — inclusief blokfluit en muziek', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Aanmelden', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'Aanmelden of eerst even overleggen? Mail naar opleidingen@soli.nl.', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

<?php
			$soli_bfk_cta = array(
				'buttonText'  => __( 'Meld je kind aan →', 'soli-gutenberg-theme' ),
				'dialogTitle' => __( 'Aanmelden blokfluitklas', 'soli-gutenberg-theme' ),
				'to'          => 'opleidingen@soli.nl',
				'subject'     => __( 'Aanmelding blokfluitklas', 'soli-gutenberg-theme' ),
				'body'        => __(
					"Beste Soli,\n\nGraag meld ik mijn kind aan voor de blokfluitklas.\n\nNaam kind:\nLeeftijd:\n\nMet vriendelijke groet,",
					'soli-gutenberg-theme'
				),
			);
			?>
				<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_bfk_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
