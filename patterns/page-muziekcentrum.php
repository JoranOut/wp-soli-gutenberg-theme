<?php
/**
 * Title: Muziekcentrumpagina
 * Slug: soli-gutenberg-theme/page-muziekcentrum
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de muziekcentrumpagina: het gebouw, adres, verhuur en routebeschrijving. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">Muziekcentrum</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Het Soli Muziekcentrum is ons eigen verenigingsgebouw, direct naast station Driehuis. Alle repetities, lessen en veel concerten vinden hier plaats &mdash; en ook andere verenigingen maken er al jaren graag gebruik van.</p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:paragraph -->
			<p>Het gebouw heeft naast de concertzaal een aantal kleinere ruimtes, waaronder de spiegelzaal: een zaal met spiegelwand waar onder meer het TwirlTeam traint. Bijzonder is ook de uitgebreide muziekbibliotheek.</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Het centrum is (niet-commercieel) te huur voor verenigingen en organisaties. Voor inlichtingen mail je Erik Miessen:', 'soli-gutenberg-theme' ); ?> <a href="mailto:muziekcentrum@soli.nl">muziekcentrum@soli.nl</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"large","className":"soli-card-media"} -->
			<figure class="wp-block-image size-large soli-card-media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/group-bandstand.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Muzikanten van Soli voor het Soli Muziekcentrum', 'soli-gutenberg-theme' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">Zo vind je ons</h2>
	<!-- /wp:heading -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"26rem"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} --><h3 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Bezoekadres', 'soli-gutenberg-theme' ); ?></h3><!-- /wp:heading -->
			<!-- wp:paragraph -->
			<p>Kerkpad 83<br>2071 CX Santpoort-Noord<br>(023) 537 90 25</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
			<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Let op: dit is géén postadres. Post stuur je naar het secretariaat — zie de contactpagina.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
			<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Tip: Google Maps zet Soli niet altijd op de juiste plek. Gebruik voor de routeplanner eventueel Hagelingerweg 325; het gebouw ligt direct naast station Driehuis.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} --><h3 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Met het openbaar vervoer', 'soli-gutenberg-theme' ); ?></h3><!-- /wp:heading -->
			<!-- wp:group {"className":"soli-fact-list","layout":{"type":"default"},"style":{"spacing":{"blockGap":"1rem"}}} -->
			<div class="wp-block-group soli-fact-list">
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Trein', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'stoptrein Amsterdam-Uitgeest (via Haarlem), uitstappen op station Driehuis — het gebouw ligt er direct naast', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
				<!-- wp:group {"className":"soli-fact","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
				<div class="wp-block-group soli-fact">
					<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Bus', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
					<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'lijn 3 (Haarlem-IJmuiden), halte Van den Vondellaan, Driehuis', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
			<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
			<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Plan je reis van deur tot deur via', 'soli-gutenberg-theme' ); ?> <a href="https://9292.nl">9292.nl</a>.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} --><h3 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Met de auto', 'soli-gutenberg-theme' ); ?></h3><!-- /wp:heading -->
			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'Neem vanaf de A9 of A22 de afslag IJmuiden en volg de Parkweg. Bij de tweede verkeerslichten linksaf, aan het einde linksaf de Waterloolaan op, richting Driehuis/Santpoort-Noord. Bij beide rotondes rechtdoor over de Van den Vondellaan; direct na de tweede rotonde (vóór het viaduct) rechtsaf en meteen weer links naar de parkeerplaats.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'Parkeer de auto en neem het fietstunneltje: aan de andere kant ligt het Soli Muziekcentrum aan de rechterkant.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"className":"is-style-soli-card soli-card-ink","backgroundColor":"ink","textColor":"cream","layout":{"type":"default"}} -->
	<div class="wp-block-group is-style-soli-card soli-card-ink has-ink-background-color has-cream-color has-text-color has-background">
		<!-- wp:paragraph {"className":"soli-eyebrow-gold"} -->
		<p class="soli-eyebrow-gold"><?php esc_html_e( 'Even binnenlopen?', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( 'Op de meeste avonden wordt er gerepeteerd — loop gerust binnen om de sfeer te proeven.', 'soli-gutenberg-theme' ); ?> <a href="<?php echo esc_url( home_url( '/agenda/' ) ); ?>"><?php esc_html_e( 'Bekijk de agenda →', 'soli-gutenberg-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
