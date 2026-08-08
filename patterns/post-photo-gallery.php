<?php
/**
 * Title: Fotogalerij (nieuwsbericht)
 * Slug: soli-gutenberg-theme/post-photo-gallery
 * Categories: soli
 * Description: Foto-essay raster voor een fotoverslag: twee brede en twee smalle foto's.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"className":"soli-post-gallery","layout":{"type":"default"}} -->
<div class="wp-block-group soli-post-gallery">
	<!-- wp:image {"sizeSlug":"large","className":"soli-post-gallery__item is-wide"} -->
	<figure class="wp-block-image size-large soli-post-gallery__item is-wide"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/groepen/oud-goud.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Oud Goud speelt tijdens het optreden', 'soli-gutenberg-theme' ); ?>"/></figure>
	<!-- /wp:image -->

	<!-- wp:image {"sizeSlug":"large","className":"soli-post-gallery__item"} -->
	<figure class="wp-block-image size-large soli-post-gallery__item"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/groepen/bigband.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Het orkest tijdens het optreden', 'soli-gutenberg-theme' ); ?>"/></figure>
	<!-- /wp:image -->

	<!-- wp:image {"sizeSlug":"large","className":"soli-post-gallery__item"} -->
	<figure class="wp-block-image size-large soli-post-gallery__item"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/group-bandstand.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Publiek tijdens het optreden', 'soli-gutenberg-theme' ); ?>"/></figure>
	<!-- /wp:image -->

	<!-- wp:image {"sizeSlug":"large","className":"soli-post-gallery__item is-wide"} -->
	<figure class="wp-block-image size-large soli-post-gallery__item is-wide"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/groepen/groepsfoto.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Groepsfoto na afloop', 'soli-gutenberg-theme' ); ?>"/></figure>
	<!-- /wp:image -->
</div>
<!-- /wp:group -->
