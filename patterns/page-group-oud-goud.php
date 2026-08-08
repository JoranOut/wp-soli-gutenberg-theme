<?php
/**
 * Title: Groepspagina: Oud Goud
 * Slug: soli-gutenberg-theme/page-group-oud-goud
 * Categories: soli
 * Description: Volledige inhoud voor de Oud Goud-pagina (tekst, foto en zijbalk met contactgegevens). Gebruik het Groepspagina-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"className":"soli-fb-main"} -->
	<div class="wp-block-column soli-fb-main">
		<!-- wp:paragraph {"className":"soli-page-lede"} -->
		<p class="soli-page-lede">Oud Goud is het seniorenorkest van Soli: een hecht orkest met een gemiddelde leeftijd van 70 jaar, dat al sinds 1980 samen muziek maakt &mdash; en daar zichtbaar plezier aan beleeft.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Sinds 1 januari 2023 is Oud Goud offici&euml;el onderdeel van Muziekvereniging Soli, en sinds 2024 staat het orkest onder leiding van dirigent Paul Martens. De repetities zijn op woensdag in de oneven weken, van 11.00 tot 14.00 uur &mdash; met een gezellige lunchpauze tussendoor. Want het draait niet alleen om de muziek, maar ook om het samenspelen en de gezelligheid daarbuiten.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Door het jaar heen treedt Oud Goud op bij bijzondere gelegenheden, zoals het Soli Voorjaarsconcert, het VG-concert en sfeervolle kerstoptredens.</p>
		<!-- /wp:paragraph -->

		<!-- wp:image {"sizeSlug":"large","className":"soli-card-media","style":{"spacing":{"margin":{"top":"2rem"}}}} -->
		<figure class="wp-block-image size-large soli-card-media" style="margin-top:2rem"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/groepen/oud-goud.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Seniorenorkest Oud Goud tijdens een optreden', 'soli-gutenberg-theme' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Oud Goud: samen muziek maken sinds 1980.', 'soli-gutenberg-theme' ); ?></figcaption></figure>
		<!-- /wp:image -->

		<!-- wp:group {"className":"is-style-soli-card","backgroundColor":"paper","layout":{"type":"default"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-group is-style-soli-card has-paper-background-color has-background" style="margin-top:var(--wp--preset--spacing--50)">
			<!-- wp:paragraph {"className":"soli-eyebrow"} -->
			<p class="soli-eyebrow"><?php esc_html_e( 'Meespelen?', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php
			printf(
				/* translators: %s: the instruments the orchestra is looking for, rendered in bold. */
				esc_html__( 'Speelt u een blaasinstrument of slagwerk en wilt u op een ontspannen manier muziek blijven maken? We zoeken vooral %s, maar iedereen die graag musiceert kan zich aansluiten. Kom gerust eens langs bij een repetitie — u bent welkom!', 'soli-gutenberg-theme' ),
				'<strong>' . esc_html__( 'hoornspelers, hoboïsten, bariton- en tenorsaxofonisten, trompettisten en slagwerkers', 'soli-gutenberg-theme' ) . '</strong>'
			);
			?></p>
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
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Paul Martens</p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Repetitie', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'woensdag in de oneven weken, 11.00-14.00 uur (met lunchpauze)', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Sinds', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( '1980, onderdeel van Soli sinds 2023', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
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

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'Meer weten of een keer komen luisteren?', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Contactcommissie', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Ben Molenaar<br><a href="mailto:oudgoud@soli.nl">oudgoud@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

<?php
			$soli_og_cta = array(
				'buttonText'  => __( 'Kom eens luisteren →', 'soli-gutenberg-theme' ),
				'dialogTitle' => __( 'Kennismaken met Oud Goud', 'soli-gutenberg-theme' ),
				'to'          => 'oudgoud@soli.nl',
				'subject'     => __( 'Kennismaken met Oud Goud', 'soli-gutenberg-theme' ),
				'body'        => __(
					"Beste Oud Goud,\n\nGraag kom ik een keer luisteren of meespelen.\n\nNaam:\nInstrument:\n\nMet vriendelijke groet,",
					'soli-gutenberg-theme'
				),
			);
			?>
				<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_og_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
