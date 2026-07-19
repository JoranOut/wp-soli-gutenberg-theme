<?php
/**
 * Title: Groepspagina — Funband
 * Slug: soli-gutenberg-theme/page-group-funband
 * Categories: soli
 * Description: Volledige inhoud voor de Funband-pagina (tekst, video en zijbalk met echte contactgegevens). Gebruik het Groepspagina-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns alignwide">
	<!-- wp:column {"className":"soli-fb-main"} -->
	<div class="wp-block-column soli-fb-main">
		<!-- wp:paragraph {"fontSize":"large"} -->
		<p class="has-large-font-size">De Funband is een van de ensembles van Soli. De band bestaat uit een 15-tal enthousiaste muzikanten uit de vereniging.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>Het repertoire van de Funband loopt van Amsterdamse Medley tot Happy Hardcore en van Latin Carnaval tot Oerend Hard.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>De Funband is sinds zijn oprichting in 2015 al actief bij verschillende evenementen, van verjaardagen tot grote evenementen als de Sneeker Dweildag. Wilt u ook een muzikale omlijsting van uw evenement? De Funband is te boeken voor elke muzikale gelegenheid — of het nu gaat om een verjaardag, jubileum, bruiloft of braderie.</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>De Funband repeteert eens per drie weken op vrijdag- of zaterdagavond van 19.30 tot 22.00 uur.</p>
		<!-- /wp:paragraph -->

		<!-- wp:group {"className":"soli-embed","layout":{"type":"flex","justifyContent":"center","verticalAlignment":"center"}} -->
		<div class="wp-block-group soli-embed">
			<!-- wp:paragraph {"align":"center","className":"soli-embed-label","textColor":"white"} -->
			<p class="has-text-align-center soli-embed-label has-white-color has-text-color">▶ <?php esc_html_e( 'Funband in beeld', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-card","backgroundColor":"paper","layout":{"type":"default"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
		<div class="wp-block-group is-style-soli-card has-paper-background-color has-background" style="margin-top:var(--wp--preset--spacing--50)">
			<!-- wp:paragraph {"className":"soli-eyebrow"} -->
			<p class="soli-eyebrow"><?php esc_html_e( 'Meespelen?', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php
			printf(
				/* translators: %1$s and %2$s are instrument names rendered in bold. */
				esc_html__( 'Er is nog plek voor een %1$s en een %2$s. Kom gerust eens langs bij een repetitie.', 'soli-gutenberg-theme' ),
				'<strong>' . esc_html__( 'trompettist / baritonist', 'soli-gutenberg-theme' ) . '</strong>',
				'<strong>' . esc_html__( 'trombonist', 'soli-gutenberg-theme' ) . '</strong>'
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
				<p class="has-small-font-size"><?php esc_html_e( 'De Funband is te boeken voor elke muzikale gelegenheid.', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Contactpersoon', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">Mar van Bekkum<br>06 11 05 21 19<br><a href="mailto:funband@soli.nl">funband@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="mailto:funband@soli.nl"><?php esc_html_e( 'Boek de Funband →', 'soli-gutenberg-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->
