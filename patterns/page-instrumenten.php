<?php
/**
 * Title: Instrumentenpagina
 * Slug: soli-gutenberg-theme/page-instrumenten
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de instrumentenpagina: bruikleen, onderhoud en schade melden. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">Instrumenten</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Bij Soli krijg je een instrument in bruikleen &mdash; zonder hoge aanschafkosten dus. Daar willen we met z'n allen zo lang mogelijk plezier van hebben, dus: wees er zuinig op.</p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Onderhoudstips per instrument', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'In deze boekjes lees je hoe je je instrument in topconditie houdt:', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"soli-index-list"} -->
				<ul class="wp-block-list soli-index-list">
					<!-- wp:list-item --><li><a href="https://www.soli.nl/wp-content/uploads/Onderhoud-saxofoon.pdf"><span class="soli-index-label"><?php esc_html_e( 'Onderhoud saxofoon (pdf)', 'soli-gutenberg-theme' ); ?></span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
					<!-- wp:list-item --><li><a href="https://www.soli.nl/wp-content/uploads/Onderhoud-koperinstrumenten.pdf"><span class="soli-index-label"><?php esc_html_e( 'Onderhoud koperinstrumenten (pdf)', 'soli-gutenberg-theme' ); ?></span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
					<!-- wp:list-item --><li><a href="https://www.soli.nl/wp-content/uploads/Onderhoud-houtinstrumenten.pdf"><span class="soli-index-label"><?php esc_html_e( 'Onderhoud houtinstrumenten (pdf)', 'soli-gutenberg-theme' ); ?></span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
					<!-- wp:list-item --><li><a href="https://www.soli.nl/wp-content/uploads/Onderhoud-kunsstofinstrumenten.pdf"><span class="soli-index-label"><?php esc_html_e( 'Onderhoud kunststofinstrumenten (pdf)', 'soli-gutenberg-theme' ); ?></span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Iets kapot? Meld het meteen', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'Is er iets met je instrument? Meld het zo snel mogelijk bij de instrumentencommissie, dan zoeken we samen een oplossing. Let op: zonder schadeformulier kan een reparatie niet worden vergoed.', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Instrumentencommissie', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value">a.i. Peter Oudendijk<br><a href="mailto:instrumenten@soli.nl">instrumenten@soli.nl</a></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

<?php
			$soli_instr_cta = array(
				'buttonText'  => __( 'Meld een schade →', 'soli-gutenberg-theme' ),
				'dialogTitle' => __( 'Schade melden', 'soli-gutenberg-theme' ),
				'to'          => 'instrumenten@soli.nl',
				'subject'     => __( 'Schademelding instrument', 'soli-gutenberg-theme' ),
				'body'        => __(
					"Beste instrumentencommissie,\n\nGraag meld ik een schade aan mijn instrument in bruikleen.\n\nNaam:\nInstrument:\nWat is er aan de hand:\n\nMet vriendelijke groet,",
					'soli-gutenberg-theme'
				),
			);
			?>
				<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_instr_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->
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
	<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Nog geen instrument? Bij het lidmaatschap kijken we samen welk instrument beschikbaar is.', 'soli-gutenberg-theme' ); ?> <a href="<?php echo esc_url( home_url( '/vereniging/lidmaatschap/' ) ); ?>"><?php esc_html_e( 'Lees meer over lid worden →', 'soli-gutenberg-theme' ); ?></a></p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->
