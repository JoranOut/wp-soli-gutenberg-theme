<?php
/**
 * Title: Groepspagina: Klein Orkest
 * Slug: soli-gutenberg-theme/page-group-klein-orkest
 * Categories: soli
 * Description: Volledige inhoud voor de Klein Orkest-pagina (tekst, foto en zijbalk met contactgegevens). Gebruik het Groepspagina-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"className":"soli-fb-main"} -->
	<div class="wp-block-column soli-fb-main">
		<!-- wp:paragraph {"className":"soli-page-lede"} -->
		<p class="soli-page-lede">Het Klein Orkest is een enthousiast ensemble van zo'n veertig muzikanten, van 15 tot 65 jaar. Gezelligheid, samenspel en sfeervolle concerten staan er voorop.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Met het accent op populaire en lichte muziek brengt het orkest een swingend en vooral afwisselend programma: pop-, film- en musicalmuziek. Op de lessenaar staan nu onder andere Amy Winehouse, Andrew Lloyd Webber, Cabaret, Count Basie en House of Horrors. Onder leiding van Frank Bollebakker wordt het repertoire wekelijks verder uitgebreid.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>De muziekstijl en de relatief kleine omvang lenen zich prima voor optredens op braderie&euml;n, dorpsfeesten en in caf&eacute;s &mdash; het Klein Orkest staat garant voor een spetterend optreden.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Het orkest speelt in harmoniebezetting: hout- en koperblazers en slagwerk. Het instapniveau is het B-diploma; leerlingen stromen vanuit het opleidingsorkest door naar het Klein Orkest.</p>
		<!-- /wp:paragraph -->

		<!-- wp:image {"sizeSlug":"large","className":"soli-card-media","style":{"spacing":{"margin":{"top":"2rem"}}}} -->
		<figure class="wp-block-image size-large soli-card-media" style="margin-top:2rem"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/groepen/groepsfoto.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Het Klein Orkest van Soli tijdens een optreden', 'soli-gutenberg-theme' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'Het Klein Orkest: swingend en afwisselend.', 'soli-gutenberg-theme' ); ?></figcaption></figure>
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
				esc_html__( 'Versterking voor de %s is zeer welkom. Kom gerust eens langs op donderdagavond.', 'soli-gutenberg-theme' ),
				'<strong>' . esc_html__( 'klarinetten en de hoorn', 'soli-gutenberg-theme' ) . '</strong>'
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
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Frank Bollebakker</p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Repetitie', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'donderdag 19.45-22.00 uur, Soli Muziekcentrum', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Bezetting', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( '± 40 leden (15-65 jaar), harmoniebezetting', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Niveau', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'HaFaBra B-diploma', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
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
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Freek Bot<br><a href="mailto:kleinorkest@soli.nl">kleinorkest@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

<?php
			$soli_ko_cta = array(
				'buttonText'  => __( 'Speel een keer mee →', 'soli-gutenberg-theme' ),
				'dialogTitle' => __( 'Meespelen met het Klein Orkest', 'soli-gutenberg-theme' ),
				'to'          => 'kleinorkest@soli.nl',
				'subject'     => __( 'Meespelen Klein Orkest', 'soli-gutenberg-theme' ),
				'body'        => __(
					"Beste Freek,\n\nGraag kom ik een keer meespelen met het Klein Orkest.\n\nNaam:\nInstrument:\nDiploma/niveau:\n\nMet vriendelijke groet,",
					'soli-gutenberg-theme'
				),
			);
			?>
				<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_ko_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
