<?php
/**
 * Title: Op de lessenaar (setlist)
 * Slug: soli-gutenberg-theme/post-setlist
 * Categories: soli
 * Description: Kleine notitie met de stukken die tijdens een optreden gespeeld zijn, voor een nieuwsbericht.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"className":"soli-post-setlist","layout":{"type":"default"}} -->
<div class="wp-block-group soli-post-setlist">
	<!-- wp:paragraph {"className":"soli-post-setlist__label"} -->
	<p class="soli-post-setlist__label"><?php esc_html_e( 'Op de lessenaar', 'soli-gutenberg-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:paragraph {"className":"soli-post-setlist__items"} -->
	<p class="soli-post-setlist__items"><?php esc_html_e( 'Fanfare · Louis Armstrong · Olé Guapa', 'soli-gutenberg-theme' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->
