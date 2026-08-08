<?php
/**
 * Title: Verenigingspagina
 * Slug: soli-gutenberg-theme/page-vereniging
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de verenigingspagina: intro, waarom lid worden en linkraster naar onderliggende pagina's. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">Vereniging</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Muziekvereniging Soli bestaat uit ongeveer 170 enthousiaste leden van jong tot oud. De vereniging is in 1909 opgericht in Driehuis en is altijd een belangrijke culturele factor in de omgeving geweest.</p>
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
			<p>Goed muziekonderwijs staat voorop bij Soli. Maar ook gezelligheid is belangrijk, en zelfredzaamheid. Soli heeft een eigen verenigingsgebouw, en kan daardoor veel activiteiten ontplooien. Indrukwekkend zijn de uitgebreide muziekbibliotheek en de spiegelzaal waar balletschool Jolein en het eigen TwirlTeam oefenen.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#lid-worden"><?php esc_html_e( 'Waarom lid worden →', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline-maroon"} -->
				<div class="wp-block-button is-style-outline-maroon"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/vereniging/muziekcentrum/' ) ); ?>"><?php esc_html_e( 'Muziekcentrum', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"large","className":"soli-card-media"} -->
			<figure class="wp-block-image size-large soli-card-media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/group-bandstand.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Groepsfoto van Muziekvereniging Soli voor de muziektent', 'soli-gutenberg-theme' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"anchor":"lid-worden","style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" id="lid-worden" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">Waarom lid worden van Soli:</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"textColor":"muted"} -->
	<p class="has-muted-color has-text-color">Een belangrijke vraag is natuurlijk waarom het volgen van een muziekopleiding via Soli een goede keuze is. Voor het gemak hebben we een aantal redenen op een rijtje gezet.</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:column {"verticalAlignment":"center","width":"42%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:42%">
			<!-- wp:image {"sizeSlug":"large","aspectRatio":"3/4","scale":"cover","className":"soli-card-media"} -->
			<figure class="wp-block-image size-large soli-card-media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/trumpet-kids.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Jonge muzikanten van Soli tijdens een repetitie', 'soli-gutenberg-theme' ); ?>" style="aspect-ratio:3/4;object-fit:cover"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:group {"layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
			<div class="wp-block-group">
				<!-- wp:group {"className":"soli-reason","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
				<div class="wp-block-group soli-reason">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"20px"}}} --><h3 class="wp-block-heading" style="font-size:20px">Spelen in een ensemble is leuk en leerzaam</h3><!-- /wp:heading -->
					<!-- wp:paragraph {"fontSize":"small"} --><p class="has-small-font-size">Het leren bespelen van een instrument is leuk, maar samen muziek maken is veel leuker dan in je eentje. Muzikanten leren veel van elkaar door samen te spelen.</p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"soli-reason","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
				<div class="wp-block-group soli-reason">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"20px"}}} --><h3 class="wp-block-heading" style="font-size:20px">Geen hoge aanschafkosten voor een instrument</h3><!-- /wp:heading -->
					<!-- wp:paragraph {"fontSize":"small"} --><p class="has-small-font-size">Omdat Soli een instrument in bruikleen geeft, hoeft u geen duur instrument aan te schaffen. Daar tegenover staat dat wij van de leden verwachten dat zij meewerken aan diverse activiteiten van Soli.</p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"soli-reason","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
				<div class="wp-block-group soli-reason">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"20px"}}} --><h3 class="wp-block-heading" style="font-size:20px">Een muziekopleiding via Soli</h3><!-- /wp:heading -->
					<!-- wp:paragraph {"fontSize":"small"} --><p class="has-small-font-size">Het is mogelijk een volwaardige muziekopleiding te volgen via Soli, met officieel erkende HaFaBra-diploma's en professionele docenten.</p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:group {"className":"soli-reason","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
				<div class="wp-block-group soli-reason">
					<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"20px"}}} --><h3 class="wp-block-heading" style="font-size:20px">Het verenigingsaspect staat hoog in het vaandel</h3><!-- /wp:heading -->
					<!-- wp:paragraph {"fontSize":"small"} --><p class="has-small-font-size">Behalve in het muzikale samenspel komt dit tot uiting in de betrokkenheid bij elkaar en de gezamenlijke zorg voor het voortbestaan van Soli.</p><!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Zin om mee te spelen? We denken graag mee over instrument, les en orkest.', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="mailto:opleidingen@soli.nl"><?php esc_html_e( 'Meld je aan via e-mail', 'soli-gutenberg-theme' ); ?></a></div>
			<!-- /wp:button -->

			<!-- wp:button {"className":"is-style-outline-maroon"} -->
			<div class="wp-block-button is-style-outline-maroon"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Neem contact op →', 'soli-gutenberg-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
		<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Liever eerst de sfeer proeven? Loop vrijblijvend binnen bij een repetitie in het Soli Muziekcentrum.', 'soli-gutenberg-theme' ); ?> <a href="<?php echo esc_url( home_url( '/agenda/' ) ); ?>"><?php esc_html_e( 'Bekijk de repetitietijden in de agenda →', 'soli-gutenberg-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading -->
		<h2 class="wp-block-heading">Bekijk de onderliggende pagina's.</h2>
		<!-- /wp:heading -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline-maroon"} -->
			<div class="wp-block-button is-style-outline-maroon"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact →', 'soli-gutenberg-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"26rem"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} --><h3 class="wp-block-heading" style="font-size:22px">Vereniging</h3><!-- /wp:heading -->
			<!-- wp:list {"className":"soli-index-list"} -->
			<ul class="wp-block-list soli-index-list">
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/bestuur/' ) ); ?>"><span class="soli-index-label">Bestuur</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/eregalerij/' ) ); ?>"><span class="soli-index-label">Eregalerij</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/muziekcentrum/' ) ); ?>"><span class="soli-index-label">Muziekcentrum</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} --><h3 class="wp-block-heading" style="font-size:22px">In veilige handen</h3><!-- /wp:heading -->
			<!-- wp:paragraph {"className":"soli-index-intro","fontSize":"small"} --><p class="soli-index-intro has-small-font-size">Eind 2013 is er binnen Muziekvereniging Soli een werkgroep gevormd vanuit een Algemene Ledenvergadering. Die zorgt ervoor dat leden, vrijwilligers, medewerkers en bezoekers van Soli in veilige handen zijn.</p><!-- /wp:paragraph -->
			<!-- wp:list {"className":"soli-index-list"} -->
			<ul class="wp-block-list soli-index-list">
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/in-veilige-handen/' ) ); ?>"><span class="soli-index-label">Vertrouwenspersonen &amp; gedragscode</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/in-veilige-handen/#omgangsregels' ) ); ?>"><span class="soli-index-label">Omgangsregels</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/in-veilige-handen/#meldprotocol' ) ); ?>"><span class="soli-index-label">Meldprotocol & brochures</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} --><h3 class="wp-block-heading" style="font-size:22px">Leden</h3><!-- /wp:heading -->
			<!-- wp:paragraph {"className":"soli-index-intro","fontSize":"small"} --><p class="soli-index-intro has-small-font-size">Soli kent een groot ledenbestand met ongeveer 170 leden. Op onderstaande pagina's staan de diensten die wij onze leden bieden, van het Jeugd Activiteiten Team tot de uitleen van instrumenten.</p><!-- /wp:paragraph -->
			<!-- wp:list {"className":"soli-index-list"} -->
			<ul class="wp-block-list soli-index-list">
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/instrumenten/' ) ); ?>"><span class="soli-index-label">Instrumenten</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/jat/' ) ); ?>"><span class="soli-index-label">JAT</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/lidmaatschap/' ) ); ?>"><span class="soli-index-label">Lidmaatschap</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/muzieklessen/' ) ); ?>"><span class="soli-index-label">Muzieklessen</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><span class="soli-index-label">Privacyreglement</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/mijn-pagina/' ) ); ?>"><span class="soli-index-label">Mijn Soli</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} --><h3 class="wp-block-heading" style="font-size:22px">Overig</h3><!-- /wp:heading -->
			<!-- wp:list {"className":"soli-index-list"} -->
			<ul class="wp-block-list soli-index-list">
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/muziek-op-schoot/' ) ); ?>"><span class="soli-index-label">Muziek op Schoot</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/pr-en-boekingen/' ) ); ?>"><span class="soli-index-label">PR en Boekingen</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/vacatures/' ) ); ?>"><span class="soli-index-label">Gezocht: vrijwilligers &amp; muzikanten</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/vrienden-van-soli/' ) ); ?>"><span class="soli-index-label">Vrienden van Soli</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
