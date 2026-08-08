<?php
/**
 * Title: PR en Boekingen-pagina
 * Slug: soli-gutenberg-theme/page-pr-boekingen
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de PR- en boekingenpagina: perscontact en Soli boeken voor optredens. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">PR en Boekingen</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Soli telt zo'n 200 actieve leden en is muzikaal niet voor &eacute;&eacute;n gat te vangen. Van een compleet concert tot een klein ensemble aan uw feesttafel: samen bekijken we wat bij uw gelegenheid past.</p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">Soli boeken</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Particulieren en bedrijven kunnen het Harmonieorkest, het Klein Orkest, het Opleidingsorkest, de Slagwerkgroep of het TwirlTeam inhuren om festiviteiten luister bij te zetten. Daarnaast zijn er gespecialiseerde groepen voor elke gelegenheid: <a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/marsorkest/' ) ); ?>">het Marsorkest</a>, <a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/pietenband/' ) ); ?>">de Pietenband</a>, <a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/funband/' ) ); ?>">de Funband</a>, <a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/stil-orkest/' ) ); ?>">het Stil Orkest</a> en <a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/kerstensembles/' ) ); ?>">verschillende kerstensembles</a>.</p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p>Afhankelijk van de gelegenheid bekijken we de mogelijkheden: soms een selectie instrumentalisten, soms het orkest in volle bezetting. Het Marsorkest &mdash; slagwerk, TwirlTeam en blazers samen &mdash; verzorgt een fantastisch marsoptreden, en ook kleinere gelegenheden luisteren we graag muzikaal op.</p>
	<!-- /wp:paragraph -->

	<!-- wp:group {"className":"is-style-soli-card","backgroundColor":"paper","layout":{"type":"default"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-group is-style-soli-card has-paper-background-color has-background" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:paragraph {"className":"soli-eyebrow"} -->
		<p class="soli-eyebrow"><?php esc_html_e( 'Optreden aanvragen', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( 'Voor inlichtingen over optredens neemt u contact op met ons secretariaat:', 'soli-gutenberg-theme' ); ?> <a href="mailto:secretariaat@soli.nl">secretariaat@soli.nl</a></p>
		<!-- /wp:paragraph -->

<?php
	$soli_prb_cta = array(
		'buttonText'  => __( 'Vraag een optreden aan →', 'soli-gutenberg-theme' ),
		'dialogTitle' => __( 'Optreden aanvragen', 'soli-gutenberg-theme' ),
		'to'          => 'secretariaat@soli.nl',
		'subject'     => __( 'Aanvraag optreden Soli', 'soli-gutenberg-theme' ),
		'body'        => __(
			"Beste Soli,\n\nGraag zou ik Soli willen boeken voor een optreden.\n\nGelegenheid:\nDatum:\nLocatie:\nGewenste bezetting (indien bekend):\n\nMet vriendelijke groet,",
			'soli-gutenberg-theme'
		),
	);
	?>
		<!-- wp:soli/email-cta <?php echo wp_json_encode( $soli_prb_cta ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- wp_json_encode returns valid, escaped JSON for the block comment. ?> /-->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:heading -->
	<h2 class="wp-block-heading">Pers en PR</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph -->
	<p>Voor contacten met de pers en andere externe partijen is bestuurslid Bernadette Duineveld het aanspreekpunt. De PR-commissie schrijft daarnaast persberichten, fotografeert en verzorgt de berichtgeving op de website.</p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Wilt u de vereniging benaderen voor een uitgebreide kennismaking of andere zaken? Mail naar', 'soli-gutenberg-theme' ); ?> <a href="mailto:pr@soli.nl">pr@soli.nl</a>.</p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->
