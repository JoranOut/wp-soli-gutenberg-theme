<?php
/**
 * Title: Muzieklessenpagina
 * Slug: soli-gutenberg-theme/page-muzieklessen
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de muzieklessenpagina: wat de lessen inhouden, wat ze kosten en hoe je je aanmeldt. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">Muzieklessen</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Of je nu klarinet, trompet of saxofoon wilt spelen: muziekles bij Soli is leuk, leerzaam &eacute;n betaalbaar. Vanaf 9 jaar kun je les nemen op allerlei blaas- en slaginstrumenten, en onze professionele docenten stomen je klaar voor de landelijk erkende HaFaBra-diploma's.</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"14rem"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Leeftijd', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'vanaf 9 jaar', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Lessen', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( '34 lessen per jaar, professionele docenten', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'In bruikleen', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'instrument én lesboeken', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"is-style-soli-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
		<div class="wp-block-group is-style-soli-panel">
			<!-- wp:paragraph {"className":"soli-fact-label"} --><p class="soli-fact-label"><?php esc_html_e( 'Kosten', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"soli-fact-value"} --><p class="soli-fact-value"><?php esc_html_e( 'vanaf € 31,25 per maand (voor leden)', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">Snel samenspelen</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Les nemen is bij Soli nooit een solo-avontuur: als leerling stroom je snel door naar een van de startorkesten &mdash; de <a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/opstapklas/' ) ); ?>">opstapklas</a> voor de jeugd of de <a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/volwassenen-opstapklas/' ) ); ?>">volwassenen opstapklas</a> (18+). Voor deelname aan de orkesten betaal je in de regel niets extra.</p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">Wat kosten de lessen?</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>De kosten hangen af van het tarief van de docent en het aantal lessen. Reken op jaarbasis op circa &euro; 525: 34 lessen van 20 minuten tegen een tarief van ongeveer &euro; 45 per uur. Voor volwassenen (21+) komt daar btw bij.</p>
	<!-- /wp:paragraph -->

	<!-- wp:list -->
	<ul class="wp-block-list">
		<!-- wp:list-item --><li>Soli-leden uit Velsen kunnen gebruikmaken van een gemeentelijke subsidie van maximaal &euro; 150.</li><!-- /wp:list-item -->
		<!-- wp:list-item --><li>Voor muzieklessen is een Soli-lidmaatschap verplicht (vanaf &euro; 12,50 per maand — zie <a href="<?php echo esc_url( home_url( '/vereniging/lidmaatschap/' ) ); ?>">lidmaatschap</a>).</li><!-- /wp:list-item -->
		<!-- wp:list-item --><li>Je schrijft je zelf in bij een HaFaBra-muziekdocent en betaalt de lessen rechtstreeks aan de docent.</li><!-- /wp:list-item -->
	</ul>
	<!-- /wp:list -->

	<!-- wp:group {"className":"is-style-soli-card soli-card-ink","backgroundColor":"ink","textColor":"cream","layout":{"type":"default"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-group is-style-soli-card soli-card-ink has-ink-background-color has-cream-color has-text-color has-background" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:paragraph {"className":"soli-eyebrow-gold"} -->
		<p class="soli-eyebrow-gold"><?php esc_html_e( 'Opgeven of meer weten?', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( 'Marian Miessen, hoofd opleidingen, denkt graag mee over instrument en docent:', 'soli-gutenberg-theme' ); ?> <a href="mailto:opleidingen@soli.nl">opleidingen@soli.nl</a></p>
		<!-- /wp:paragraph -->

<?php
	$soli_ml_cta = array(
		'buttonText'  => __( 'Meld je aan voor muziekles →', 'soli-gutenberg-theme' ),
		'dialogTitle' => __( 'Aanmelden muziekles', 'soli-gutenberg-theme' ),
		'to'          => 'opleidingen@soli.nl',
		'subject'     => __( 'Aanmelding muziekles', 'soli-gutenberg-theme' ),
		'body'        => __(
			"Beste Marian,\n\nGraag wil ik (of wil mijn kind) muziekles volgen bij Soli.\n\nNaam:\nLeeftijd:\nGewenst instrument:\n\nMet vriendelijke groet,",
			'soli-gutenberg-theme'
		),
	);
	?>
		<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_ml_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
