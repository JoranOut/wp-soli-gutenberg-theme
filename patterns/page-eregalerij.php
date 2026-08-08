<?php
/**
 * Title: Eregalerijpagina
 * Slug: soli-gutenberg-theme/page-eregalerij
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de eregalerijpagina: ereleden van Soli. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">Eregalerij</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Aan leden die van bijzondere betekenis zijn geweest voor Soli kan het erelidmaatschap worden toegekend. Zij krijgen een plek op de eregalerij die in het Muziekcentrum hangt &mdash; een eervolle wand vol verenigingsgeschiedenis.</p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:image {"align":"wide","sizeSlug":"large","className":"soli-card-media"} -->
	<figure class="wp-block-image alignwide size-large soli-card-media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/groepsfoto.jpg' ) ); ?>" alt="<?php esc_attr_e( 'De eregalerij met portretten van de ereleden van Soli', 'soli-gutenberg-theme' ); ?>"/><figcaption class="wp-element-caption"><?php esc_html_e( 'De eregalerij in het Soli Muziekcentrum.', 'soli-gutenberg-theme' ); ?></figcaption></figure>
	<!-- /wp:image -->

	<!-- wp:paragraph {"textColor":"muted","fontSize":"small","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
	<p class="has-muted-color has-text-color has-small-font-size" style="margin-top:var(--wp--preset--spacing--40)"><?php esc_html_e( 'Kom je langs in het Muziekcentrum? De eregalerij hangt er in het echt — zeker de moeite waard.', 'soli-gutenberg-theme' ); ?> <a href="<?php echo esc_url( home_url( '/vereniging/muziekcentrum/' ) ); ?>"><?php esc_html_e( 'Bezoek het Muziekcentrum →', 'soli-gutenberg-theme' ); ?></a></p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->
