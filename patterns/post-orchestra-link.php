<?php
/**
 * Title: Doorverwijzing naar orkestpagina
 * Slug: soli-gutenberg-theme/post-orchestra-link
 * Categories: soli
 * Description: Kaart onderaan een nieuwsbericht die doorverwijst naar de bijbehorende orkest- of groepspagina.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:paragraph {"className":"soli-post-next"} -->
<p class="soli-post-next"><a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/oud-goud/' ) ); ?>"><span class="soli-post-next__kicker"><?php esc_html_e( 'Meer over dit orkest', 'soli-gutenberg-theme' ); ?></span><span class="soli-post-next__title"><?php esc_html_e( 'Oud Goud, het seniorenorkest van Soli', 'soli-gutenberg-theme' ); ?></span><span class="soli-post-next__cta"><?php esc_html_e( 'Naar de orkestpagina →', 'soli-gutenberg-theme' ); ?></span></a></p>
<!-- /wp:paragraph -->
