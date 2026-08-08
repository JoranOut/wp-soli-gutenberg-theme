<?php
/**
 * Title: Groepspagina: TwirlTeam
 * Slug: soli-gutenberg-theme/page-group-twirlteam
 * Categories: soli
 * Description: Volledige inhoud voor de TwirlTeam-pagina (tekst, video en zijbalk met contactgegevens). Gebruik het Groepspagina-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"className":"soli-fb-main"} -->
	<div class="wp-block-column soli-fb-main">
		<!-- wp:paragraph {"className":"soli-page-lede"} -->
		<p class="soli-page-lede">TwirlTeam Soli doet aan dancetwirl: een showsport waarin gymnastiek en dans op muziek worden gecombineerd met een baton &mdash; een draaistok waarmee je twirls en andere tricks doet.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Dat maakt het dansen soms best lastig, maar juist dat is de uitdaging: samen met je team een show neerzetten. Voor de variatie werken we ook regelmatig met pompoms, vlaggen en andere attributen.</p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"20px"}}} -->
		<h3 class="wp-block-heading" style="font-size:20px">Optredens door het hele jaar</h3>
		<!-- /wp:heading -->

		<!-- wp:list -->
		<ul class="wp-block-list">
			<!-- wp:list-item --><li><strong>Eigen shows</strong> &mdash; elk team maakt jaarlijks een show op zelfgekozen muziek, en samen werken de teams aan een gezamenlijke show.</li><!-- /wp:list-item -->
			<!-- wp:list-item --><li><strong>Shows op livemuziek</strong> &mdash; op muziek van de Soli-orkesten, uitgevoerd tijdens het voorjaarsconcert en waar mogelijk andere concerten.</li><!-- /wp:list-item -->
			<!-- wp:list-item --><li><strong>Marsoptredens</strong> &mdash; als visitekaartje van het marsorkest lopen we voorop met kleine shows, een paar keer per jaar.</li><!-- /wp:list-item -->
		</ul>
		<!-- /wp:list -->

		<!-- wp:paragraph -->
		<p>We trainen elke woensdagavond in sportkleding, met het haar in een staart en zonder sieraden &mdash; veiligheid eerst. Bij optredens zien we er natuurlijk tiptop uit: mooie jurkjes, verzorgde haren en hier en daar wat glitters.</p>
		<!-- /wp:paragraph -->

		<!-- wp:embed {"url":"https://www.youtube.com/watch?v=8rFRkSQCYh8","type":"video","providerNameSlug":"youtube","responsive":true,"className":"wp-embed-aspect-16-9 wp-has-aspect-ratio"} -->
		<figure class="wp-block-embed is-type-video is-provider-youtube wp-block-embed-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper">
https://www.youtube.com/watch?v=8rFRkSQCYh8
</div><figcaption class="wp-element-caption"><?php esc_html_e( "Het A-team danst I Love Rock 'n Roll.", 'soli-gutenberg-theme' ); ?></figcaption></figure>
		<!-- /wp:embed -->

		<!-- wp:group {"className":"is-style-soli-card","backgroundColor":"paper","layout":{"type":"default"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-group is-style-soli-card has-paper-background-color has-background" style="margin-top:var(--wp--preset--spacing--50)">
			<!-- wp:paragraph {"className":"soli-eyebrow"} -->
			<p class="soli-eyebrow"><?php esc_html_e( 'Enthousiast geworden?', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php
			printf(
				/* translators: %s: "De eerste 4 lessen zijn gratis" rendered in bold. */
				esc_html__( 'Kom een keertje kijken en meedoen — iedereen vanaf 7 jaar is welkom. %s.', 'soli-gutenberg-theme' ),
				'<strong>' . esc_html__( 'De eerste 4 lessen zijn gratis', 'soli-gutenberg-theme' ) . '</strong>'
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
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Leiding', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Wendy van Gijlswijk &amp; Saskia Haan</p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Training', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'woensdag 18.30-19.30 of 18.45-20.00 uur (per team), Spiegelzaal', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Voor wie', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'iedereen vanaf 7 jaar; eerste 4 lessen gratis', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Meedoen & contact', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Contactpersoon', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Saskia Haan<br><a href="mailto:twirlteamsoli@gmail.com">twirlteamsoli@gmail.com</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

<?php
			$soli_tt_cta = array(
				'buttonText'  => __( 'Kom gratis proeflessen doen →', 'soli-gutenberg-theme' ),
				'dialogTitle' => __( 'Proeflessen TwirlTeam', 'soli-gutenberg-theme' ),
				'to'          => 'twirlteamsoli@gmail.com',
				'subject'     => __( 'Proeflessen TwirlTeam', 'soli-gutenberg-theme' ),
				'body'        => __(
					"Beste TwirlTeam,\n\nGraag kom ik (of komt mijn kind) een keertje kijken en meedoen.\n\nNaam:\nLeeftijd:\n\nMet vriendelijke groet,",
					'soli-gutenberg-theme'
				),
			);
			?>
				<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_tt_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
