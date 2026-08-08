<?php
/**
 * Title: Lidmaatschapspagina
 * Slug: soli-gutenberg-theme/page-lidmaatschap
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de lidmaatschapspagina: aanmelden, contributie, betaling en automatische incasso, opleidingskosten en voorwaarden. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">Lidmaatschap</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Lid worden van Soli is zo geregeld: formulier invullen, instrument in bruikleen, en spelen maar. Op deze pagina vind je alles over aanmelden, contributie en wat je van ons &mdash; en wij van jou &mdash; mogen verwachten.</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"level":2,"style":{"typography":{"fontSize":"22px"}}} -->
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Zo word je lid', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'Vul het aanmeldingsformulier in en stuur het naar de ledenadministratie. We kijken dan of je instrument beschikbaar is en of er plek is in een orkest — je bent definitief lid zodra beide geregeld zijn. Je krijgt een bevestiging per e-mail.', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"soli-index-list"} -->
				<ul class="wp-block-list soli-index-list">
					<!-- wp:list-item --><li><a href="https://www.soli.nl/wp-content/uploads/Aanmeldingsformulier-2023-V15.docx"><span class="soli-index-label"><?php esc_html_e( 'Aanmeldingsformulier (Word)', 'soli-gutenberg-theme' ); ?></span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
					<!-- wp:list-item --><li><a href="mailto:ledenadministratie@soli.nl"><span class="soli-index-label">ledenadministratie@soli.nl</span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
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
				<h2 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Eerst alles nalezen?', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'In het informatieboekje staat alle informatie over Soli overzichtelijk bij elkaar. Als lid ga je akkoord met het huishoudelijk reglement.', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"soli-index-list"} -->
				<ul class="wp-block-list soli-index-list">
					<!-- wp:list-item --><li><a href="https://www.soli.nl/wp-content/uploads/Informatieboek-Soli-2021.pdf"><span class="soli-index-label"><?php esc_html_e( 'Informatieboekje Soli (pdf)', 'soli-gutenberg-theme' ); ?></span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
					<!-- wp:list-item --><li><a href="https://www.soli.nl/wp-content/uploads/Versie-1.3-Huishoudelijk-Reglement-12-6-2022.pdf"><span class="soli-index-label"><?php esc_html_e( 'Huishoudelijk reglement (pdf)', 'soli-gutenberg-theme' ); ?></span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"anchor":"contributie","style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" id="contributie" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">Wat kost Soli?</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"textColor":"muted"} -->
	<p class="has-muted-color has-text-color">Je betaalt bij Soli contributie voor je lidmaatschap, en een eigen bijdrage voor de muzieklessen als je die volgt. De contributie per maand in het seizoen 2026-2027:</p>
	<!-- /wp:paragraph -->

	<!-- wp:table -->
	<figure class="wp-block-table"><table class="has-fixed-layout"><thead><tr><th></th><th><?php esc_html_e( 'Contributie', 'soli-gutenberg-theme' ); ?></th><th><?php esc_html_e( 'Stil Orkest, Funband & Oud Goud', 'soli-gutenberg-theme' ); ?></th></tr></thead><tbody><tr><td><?php esc_html_e( 'Leden', 'soli-gutenberg-theme' ); ?></td><td>€ 15,00</td><td>€ 7,50</td></tr><tr><td><?php esc_html_e( 'Leden tot 18 en vanaf 65 jaar', 'soli-gutenberg-theme' ); ?></td><td>€ 12,50</td><td>€ 7,50</td></tr><tr><td><?php esc_html_e( 'Gezinscontributie*', 'soli-gutenberg-theme' ); ?></td><td>€ 30,00</td><td><?php esc_html_e( 'n.v.t.', 'soli-gutenberg-theme' ); ?></td></tr></tbody></table></figure>
	<!-- /wp:table -->

	<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
	<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( '* Voor 3 of meer leden uit één gezin, woonachtig op hetzelfde adres. Personen met een eigen inkomen tellen hierbij niet mee als gezinslid.', 'soli-gutenberg-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":{"left":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} -->
				<h3 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Betalen', 'soli-gutenberg-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'De contributie maak je elke maand vooruit over op IBAN NL05 RABO 0145 8568 28, t.n.v. Muziekvereniging Soli.', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group is-style-soli-panel">
				<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"22px"}}} -->
				<h3 class="wp-block-heading" style="font-size:22px"><?php esc_html_e( 'Liever automatisch?', 'soli-gutenberg-theme' ); ?></h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size"><?php esc_html_e( 'Met een automatische incasso hoef je nergens meer aan te denken: Soli schrijft de contributie per drie maanden af en je krijgt twee weken vooraf een aankondiging per e-mail. Terugboeken kan tot 8 weken na afschrijving.', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:list {"className":"soli-index-list"} -->
				<ul class="wp-block-list soli-index-list">
					<!-- wp:list-item --><li><a href="https://www.soli.nl/wp-content/uploads/Doorlopende-machtiging.pdf"><span class="soli-index-label"><?php esc_html_e( 'Machtigingsformulier (pdf)', 'soli-gutenberg-theme' ); ?></span><span class="soli-index-arrow" aria-hidden="true">→</span></a></li><!-- /wp:list-item -->
				</ul>
				<!-- /wp:list -->

				<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
				<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Ingevuld formulier (met het machtigingskenmerk uit je contributieoverzicht) inscannen en mailen naar contributie@soli.nl. Intrekken kan op elk moment met een e-mail naar hetzelfde adres. Betaal je nu met een maandelijkse overboeking? Vergeet die dan niet stop te zetten.', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">Muzieklessen en opleiding</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>De muzieklessen betaal je rechtstreeks aan je HaFaBra-muziekdocent. Soli vraagt jaarlijks subsidie aan bij de gemeente Velsen om een deel van het lesgeld aan leden terug te betalen; op vertoon van een betaalbewijs kun je daarvan gebruikmaken zodra de subsidie is toegekend.</p>
	<!-- /wp:paragraph -->

	<!-- wp:list -->
	<ul class="wp-block-list">
		<!-- wp:list-item --><li>Theorielessen zijn gratis voor Soli-leden (exclusief lesboek, inclusief EARZ-gebruik en examen), in samenwerking met Cultuurhuis Heemskerk.</li><!-- /wp:list-item -->
		<!-- wp:list-item --><li>Praktijkexamens worden zonder extra kosten afgenomen bij Cultuurhuis Heemskerk.</li><!-- /wp:list-item -->
		<!-- wp:list-item --><li>Voor het instrument en de samenspelgroepen betaal je niets extra: je instrument krijg je gratis in bruikleen (mits voorradig).</li><!-- /wp:list-item -->
	</ul>
	<!-- /wp:list -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Alle prijzen en details staan op de pagina', 'soli-gutenberg-theme' ); ?> <a href="<?php echo esc_url( home_url( '/vereniging/muzieklessen/' ) ); ?>"><?php esc_html_e( 'Muzieklessen →', 'soli-gutenberg-theme' ); ?></a></p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">Wat we van elkaar mogen verwachten</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"textColor":"muted"} -->
	<p class="has-muted-color has-text-color">Soli is een vereniging: we maken er samen wat van. Lid zijn betekent daarom ook:</p>
	<!-- /wp:paragraph -->

	<!-- wp:list -->
	<ul class="wp-block-list">
		<!-- wp:list-item --><li>Meespelen in een van de samenspeelgroepen of orkesten zodra je niveau het toelaat, en de wekelijkse repetities en muzieklessen bezoeken.</li><!-- /wp:list-item -->
		<!-- wp:list-item --><li>Meedoen aan acties, verenigingsactiviteiten en optredens — zoals de jaarlijkse hyacintenactie, sop- en klusdagen en marsoptredens.</li><!-- /wp:list-item -->
		<!-- wp:list-item --><li>Zorgdragen voor verenigingseigendommen: instrument, uniform en bladmuziek.</li><!-- /wp:list-item -->
		<!-- wp:list-item --><li>Akkoord gaan met publicatie van foto's die tijdens verenigingsactiviteiten worden gemaakt.</li><!-- /wp:list-item -->
		<!-- wp:list-item --><li>De doelstellingen, het <a href="https://www.soli.nl/wp-content/uploads/Versie-1.3-Huishoudelijk-Reglement-12-6-2022.pdf">huishoudelijk reglement</a> en de <a href="<?php echo esc_url( home_url( '/vereniging/in-veilige-handen/' ) ); ?>">omgangsregels van In veilige handen</a> onderschrijven.</li><!-- /wp:list-item -->
		<!-- wp:list-item --><li>Als leerling verbind je je steeds voor een heel schooljaar en betaal je de contributie vooruit.</li><!-- /wp:list-item -->
	</ul>
	<!-- /wp:list -->

	<!-- wp:paragraph {"textColor":"muted","fontSize":"small"} -->
	<p class="has-muted-color has-text-color has-small-font-size"><?php esc_html_e( 'Opzeggen kan schriftelijk of per e-mail bij de ledenadministratie, graag met vermelding van reden. Het lidmaatschap eindigt per de 1e van de volgende maand; op dat moment lever je alle eigendommen van Soli in.', 'soli-gutenberg-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"is-style-soli-card soli-card-ink","backgroundColor":"ink","textColor":"cream","layout":{"type":"default"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-group is-style-soli-card soli-card-ink has-ink-background-color has-cream-color has-text-color has-background" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:paragraph {"className":"soli-eyebrow-gold"} -->
		<p class="soli-eyebrow-gold"><?php esc_html_e( 'Vragen?', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( 'Marian Miessen, hoofd opleidingen, helpt je graag:', 'soli-gutenberg-theme' ); ?> <a href="mailto:opleidingen@soli.nl">opleidingen@soli.nl</a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
