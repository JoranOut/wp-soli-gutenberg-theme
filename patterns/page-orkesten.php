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

?>
<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/harmonie-concours.jpg' ) ); ?>","dimRatio":60,"overlayColor":"maroon-dark","isUserOverlayColor":true,"minHeight":360,"align":"full","layout":{"type":"constrained"}} -->
<div class="wp-block-cover alignfull" style="min-height:360px">
	<span aria-hidden="true" class="wp-block-cover__background has-maroon-dark-background-color has-background-dim-60 has-background-dim"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/harmonie-concours.jpg' ) ); ?>" data-object-fit="cover"/>
	<div class="wp-block-cover__inner-container">
		<!-- wp:paragraph {"className":"soli-eyebrow"} -->
		<p class="soli-eyebrow"><?php esc_html_e( 'Onze muziek', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"level":1,"fontSize":"huge","textColor":"white"} -->
		<h1 class="wp-block-heading has-white-color has-text-color has-huge-font-size">Orkesten en groepen</h1>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"white","fontSize":"large"} -->
		<p class="has-white-color has-text-color has-large-font-size">Van harmonie tot bigband, van opstapklas tot TwirlTeam — bij Soli is er voor elke muzikant en elke smaak een plek.</p>
		<!-- /wp:paragraph -->
	</div>
</div>
<!-- /wp:cover -->

<!-- wp:pattern {"slug":"soli-gutenberg-theme/group-section"} /-->
<!-- wp:pattern {"slug":"soli-gutenberg-theme/group-section"} /-->
<!-- wp:pattern {"slug":"soli-gutenberg-theme/group-section"} /-->
