<?php
/**
 * Title: Orkesten en groepen overzicht
 * Slug: soli-gutenberg-theme/page-orkesten
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Viewport Width: 1400
 * Description: Overzichtspagina met hero en secties (Orkesten, Ensembles, Opleidingsgroepen) vol groepskaarten. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

// Resolves a group page by slug at render time so the overview shows real,
// linked cards wherever the pages exist; without a match the card is emitted
// empty and the editor's page picker takes over (visitors see nothing).
$soli_group_card = static function ( $slug, $rehearsal ) {
	$soli_group_page = get_page_by_path( 'orkesten-en-groepen/' . $slug, OBJECT, 'page' );
	if ( ! $soli_group_page ) {
		$soli_group_page = get_page_by_path( $slug, OBJECT, 'page' );
	}
	$soli_card_attrs = array( 'rehearsal' => $rehearsal );
	if ( $soli_group_page instanceof WP_Post && 'publish' === $soli_group_page->post_status ) {
		$soli_card_attrs = array( 'pageId' => (int) $soli_group_page->ID ) + $soli_card_attrs;
	}
	printf( '<!-- wp:soli/group-card %s /-->', wp_json_encode( $soli_card_attrs ) );
};
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/harmonie-concours.jpg' ) ); ?>","dimRatio":60,"overlayColor":"maroon-dark","isUserOverlayColor":true,"minHeight":360,"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="min-height:360px">
	<span aria-hidden="true" class="wp-block-cover__background has-maroon-dark-background-color has-background-dim-60 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/harmonie-concours.jpg' ) ); ?>" data-object-fit="cover"/>
	<div class="wp-block-cover__inner-container">
		<!-- wp:heading {"level":1,"fontSize":"huge","textColor":"white"} -->
		<h1 class="wp-block-heading has-white-color has-text-color has-huge-font-size">Orkesten en groepen</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"white","fontSize":"large"} -->
		<p class="has-white-color has-text-color has-large-font-size">Van harmonie tot bigband, van opstapklas tot TwirlTeam: bij Soli is er voor elke muzikant en elke smaak een plek.</p>
		<!-- /wp:paragraph -->
	</div>
</div>
<!-- /wp:cover -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|30"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group">
		<!-- wp:heading -->
		<h2 class="wp-block-heading">Orkesten</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"muted"} -->
		<p class="has-muted-color has-text-color">Soli beschikt over een breed scala aan eindorkesten. Samen representeren ze bijna alle vormen van muziek, van jazz en klassiek tot lichte muziek.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"230px"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<?php
		$soli_group_card( 'harmonie-orkest', 'di · 19:30' );
		$soli_group_card( 'klein-orkest', 'do · 19:45' );
		$soli_group_card( 'bigband', 'wo (even weken) · 20:00' );
		$soli_group_card( 'slagwerkgroep', 'ma · 20:00' );
		?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|30"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group">
		<!-- wp:heading -->
		<h2 class="wp-block-heading">Ensembles en themagroepen</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"muted"} -->
		<p class="has-muted-color has-text-color">Voor elke gelegenheid een passende bezetting: van straatoptreden en verjaardag tot Sinterklaasintocht en kerstconcert.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"230px"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<?php
		$soli_group_card( 'funband', '1× per 3 weken' );
		$soli_group_card( 'marsorkest', '1× per 4 weken · wo' );
		$soli_group_card( 'oud-goud', 'wo (oneven weken) · 11:00' );
		$soli_group_card( 'kerstensembles', 'rond de kerst' );
		$soli_group_card( 'pietenband', 'rond Sinterklaas' );
		$soli_group_card( 'twirlteam', 'wo · 18:30' );
		$soli_group_card( 'stil-orkest', 'op aanvraag' );
		?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group">
		<!-- wp:heading -->
		<h2 class="wp-block-heading">Opleiding</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"muted"} -->
		<p class="has-muted-color has-text-color">Leren spelen doe je bij Soli stap voor stap, met professionele docenten en officieel erkende HaFaBra-diploma's.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"230px"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<?php
		$soli_group_card( 'blokfluitklas', 'do · 18:00' );
		$soli_group_card( 'slagwerkklas', 'ma-avond' );
		$soli_group_card( 'opstapklas', 'start 2026/27' );
		$soli_group_card( 'volwassenen-opstapklas', 'do · 19:45' );
		$soli_group_card( 'samenspelklas', 'do · 18:45' );
		$soli_group_card( 'opleidingsorkest', 'do · 18:30' );
		?>
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
