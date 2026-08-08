<?php
/**
 * Title: Groepspagina: Slagwerkgroep
 * Slug: soli-gutenberg-theme/page-group-slagwerkgroep
 * Categories: soli
 * Description: Volledige inhoud voor de Slagwerkgroep-pagina (tekst, foto en zijbalk met contactgegevens). Gebruik het Groepspagina-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"className":"soli-fb-main"} -->
	<div class="wp-block-column soli-fb-main">
		<!-- wp:paragraph {"className":"soli-page-lede"} -->
		<p class="soli-page-lede">Voor lekker klinkende ritmes moet je bij de slagwerkgroep van Soli zijn: een mix van traditionele slagwerknummers, latin grooves en popnummers.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Daarvoor gebruiken we van alles: van snaredrum en drumstel tot marimba en cajons. Lekker divers dus. De groep telt momenteel acht leden en drie leerlingen in opleiding, en staat onder leiding van Wendy Palomeque.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Op maandagavond krijgen eerst de leerlingen priv&eacute;les. Zij oefenen voor hun slagwerkdiploma A en leren nummers die ze samen met de groep kunnen spelen. Om 20.00 uur start de slagwerkgroep zelf.</p>
		<!-- /wp:paragraph -->

		<!-- wp:image {"sizeSlug":"large","className":"soli-card-media","style":{"spacing":{"margin":{"top":"2rem"}}}} -->
		<figure class="wp-block-image size-large soli-card-media" style="margin-top:2rem"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/groepsfoto.jpg' ) ); ?>" alt="<?php esc_attr_e( 'De slagwerkgroep van Soli tijdens een concert', 'soli-gutenberg-theme' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'De slagwerkgroep: van snaredrum tot marimba.', 'soli-gutenberg-theme' ); ?></figcaption></figure>
		<!-- /wp:image -->

		<!-- wp:group {"className":"is-style-soli-card","backgroundColor":"paper","layout":{"type":"default"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-group is-style-soli-card has-paper-background-color has-background" style="margin-top:var(--wp--preset--spacing--50)">
			<!-- wp:paragraph {"className":"soli-eyebrow"} -->
			<p class="soli-eyebrow"><?php esc_html_e( 'Meespelen?', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'De groep wil graag groeien. Iedereen — jong (vanaf groep 5) en minder jong, ervaren of onervaren — is welkom om een paar keer mee te repeteren. De dirigent en de leden nemen je graag mee de wereld van het slagwerk in.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
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
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Dirigent', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Wendy Palomeque</p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Repetitie', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'maandag 20.00 uur (leerlingen eerder), Soli Muziekcentrum', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Bezetting', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( '8 leden en 3 leerlingen in opleiding', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Voor wie', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'iedereen vanaf groep 5, met of zonder ervaring', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Meespelen & contact', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Contactpersoon', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Peter Haan<br><a href="mailto:slagwerkgroepsoli@gmail.com">slagwerkgroepsoli@gmail.com</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

<?php
			$soli_swg_cta = array(
				'buttonText'  => __( 'Kom een keer meedoen →', 'soli-gutenberg-theme' ),
				'dialogTitle' => __( 'Meespelen met de slagwerkgroep', 'soli-gutenberg-theme' ),
				'to'          => 'slagwerkgroepsoli@gmail.com',
				'subject'     => __( 'Meespelen slagwerkgroep', 'soli-gutenberg-theme' ),
				'body'        => __(
					"Beste Peter,\n\nGraag kom ik een keer kijken en meedoen bij de slagwerkgroep.\n\nNaam:\nLeeftijd:\nErvaring:\n\nMet vriendelijke groet,",
					'soli-gutenberg-theme'
				),
			);
			?>
				<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_swg_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
