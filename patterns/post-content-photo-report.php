<?php
/**
 * Title: Berichtinhoud: Fotoverslag
 * Slug: soli-gutenberg-theme/post-content-photo-report
 * Categories: soli
 * Block Types: core/post-content
 * Post Types: post
 * Description: Startinhoud voor een fotoverslag (gebruik het Fotoverslag-sjabloon): uitgelichte afbeelding, inleidende tekst, setlist, fotocarrousel (soli/image-carousel) en een link naar de orkestpagina.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:post-featured-image {"aspectRatio":"2/1","style":{"border":{"radius":"14px"}},"className":"soli-post-hero-image"} /-->

<!-- wp:group {"className":"soli-post-prose","layout":{"type":"default"}} -->
<div class="wp-block-group soli-post-prose">
	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Als muzikant kom je nog eens ergens. Vertel hier kort waar en wanneer het optreden plaatsvond, en wie erbij waren.', 'soli-gutenberg-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph -->
	<p><?php esc_html_e( 'Beschrijf hier de sfeer van het optreden en wat het publiek ervan vond: een mooie muzikale omlijsting van de gelegenheid.', 'soli-gutenberg-theme' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"soli-gutenberg-theme/post-setlist"} /-->

<!-- wp:soli/image-carousel {"align":"wide"} /-->

<!-- wp:pattern {"slug":"soli-gutenberg-theme/post-orchestra-link"} /-->
