<?php
/**
 * Title: Gezocht!-pagina
 * Slug: soli-gutenberg-theme/page-gezocht
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de vacaturepagina: gezochte vrijwilligers, bestuursleden en muzikanten. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">Gezocht!</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Zoals elke grote vereniging is Soli altijd op zoek naar verse krachten &mdash; vrijwilligers, bestuursleden &eacute;n muzikanten. Dit zijn op dit moment onze grootste vraagstukken.</p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50)">
	<!-- wp:group {"className":"is-style-soli-card","backgroundColor":"paper","layout":{"type":"default"}} -->
	<div class="wp-block-group is-style-soli-card has-paper-background-color has-background">
		<!-- wp:paragraph {"className":"soli-eyebrow"} -->
		<p class="soli-eyebrow"><?php esc_html_e( 'Vacature', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"22px"}}} -->
		<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Algemeen bestuurslid', 'soli-gutenberg-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( 'Als algemeen bestuurslid denk je mee over het beleid en pak je taken op die qua inhoud en tijdsbesteding in overleg worden afgestemd. Het bestuur vergadert één keer per maand. Meer weten? Ons secretariaat vertelt je graag meer:', 'soli-gutenberg-theme' ); ?> <a href="mailto:secretariaat@soli.nl">secretariaat@soli.nl</a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">Muzikanten gezocht</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"textColor":"muted"} -->
	<p class="has-muted-color has-text-color">We zoeken altijd muzikanten die onze passie voor muziek delen. Bij deze groepen is op dit moment extra plek:</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"18rem"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Harmonieorkest', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/harmonie-orkest/' ) ); ?>"><?php esc_html_e( 'trombone, hoorn en trompet →', 'soli-gutenberg-theme' ); ?></a></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Klein Orkest', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/klein-orkest/' ) ); ?>"><?php esc_html_e( 'klarinet en hoorn →', 'soli-gutenberg-theme' ); ?></a></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Bigband', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/bigband/' ) ); ?>"><?php esc_html_e( '1e trompet en trombone →', 'soli-gutenberg-theme' ); ?></a></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Oud Goud', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/oud-goud/' ) ); ?>"><?php esc_html_e( 'hoorn, hobo, sax, trompet, slagwerk →', 'soli-gutenberg-theme' ); ?></a></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Marsorkest', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/marsorkest/' ) ); ?>"><?php esc_html_e( 'kopersectie →', 'soli-gutenberg-theme' ); ?></a></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Slagwerkgroep', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/slagwerkgroep/' ) ); ?>"><?php esc_html_e( 'iedereen vanaf groep 5 →', 'soli-gutenberg-theme' ); ?></a></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<p style="margin-top:var(--wp--preset--spacing--40)"><?php esc_html_e( 'Onzeker welk orkest het beste bij je past? Ons secretariaat denkt graag mee:', 'soli-gutenberg-theme' ); ?> <a href="mailto:secretariaat@soli.nl">secretariaat@soli.nl</a></p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->
