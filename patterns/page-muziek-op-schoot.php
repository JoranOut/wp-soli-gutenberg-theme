<?php
/**
 * Title: Muziek op Schoot-pagina
 * Slug: soli-gutenberg-theme/page-muziek-op-schoot
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de Muziek op Schoot-pagina: muziek voor de allerkleinsten met hun (groot)ouders. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">Muziek op Schoot</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Voor kleine kinderen zijn zingen en dansen pure levensvreugde &mdash; en prachtig om te zien. Bij Muziek op Schoot deel je dat plezier met je (klein)kind, onder leiding van een gediplomeerd docente.</p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"62%"} -->
		<div class="wp-block-column" style="flex-basis:62%">
			<!-- wp:heading {"level":2} -->
			<h2 class="wp-block-heading">De groep (1 tot 4 jaar)</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>In elke les staan liedjes centraal die aansluiten bij wat je kindje al kan. We werken veel met tastbare materialen &mdash; ballen, doeken, lintjes, blokken, schoenen, hoeden &mdash; en zingen liedjes voor beweging (kruipen, lopen, fietsen) en voor dagelijkse dingen als tandenpoetsen. Aan het eind van elke les spelen we op een echt instrumentje: het ene keer fluitjes of sambaballen, de andere keer trommels, xylofoontjes of bellenkransen.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p>Naast bekende liedjes leer je samen veel nieuwe. Zo werk je spelenderwijs aan de taalontwikkeling, het gehoor en de motoriek van je kind &mdash; en heb je als (groot)ouder meteen contact met andere (groot)ouders. Maar het belangrijkste blijft het lijntje dat ontstaat tussen jou en je kind op het moment dat het begint te zingen. De sfeer? Voor de kinderen is het &eacute;&eacute;n groot feest.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Eerstvolgende cursus', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:group {"className":"soli-fact-list","layout":{"type":"default"},"style":{"spacing":{"blockGap":"1rem"}}} -->
				<div class="wp-block-group soli-fact-list">
					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Start', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'vrijdag 28 augustus 2026, 10.45 uur', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->

					<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
					<div class="wp-block-group soli-fact">
						<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Omvang & kosten', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
						<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( '5 lessen, € 62,50', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->

<?php
			$soli_mos_cta = array(
				'buttonText'  => __( 'Meld je aan →', 'soli-gutenberg-theme' ),
				'dialogTitle' => __( 'Aanmelden Muziek op Schoot', 'soli-gutenberg-theme' ),
				'to'          => 'muziekopschoot@soli.nl',
				'subject'     => __( 'Aanmelding Muziek op Schoot', 'soli-gutenberg-theme' ),
				'body'        => __(
					"Beste Soli,\n\nGraag meld ik mij en mijn (klein)kind aan voor Muziek op Schoot.\n\nNaam:\nNaam en leeftijd kind:\n\nMet vriendelijke groet,",
					'soli-gutenberg-theme'
				),
			);
			?>
				<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_mos_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->

				<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
				<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Vragen? Mail naar', 'soli-gutenberg-theme' ); ?> <a href="mailto:muziekopschoot@soli.nl">muziekopschoot@soli.nl</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
	<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Wordt je kind wat groter? Dan is de blokfluitklas een leuke volgende stap.', 'soli-gutenberg-theme' ); ?> <a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/blokfluitklas/' ) ); ?>"><?php esc_html_e( 'Bekijk de blokfluitklas →', 'soli-gutenberg-theme' ); ?></a></p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->
