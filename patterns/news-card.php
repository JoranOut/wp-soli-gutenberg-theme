<?php
/**
 * Title: Nieuwskaart (loop)
 * Slug: soli-gutenberg-theme/news-card
 * Categories: soli, query
 * Block Types: core/post-template
 * Description: De Soli-nieuwskaart (uitgelichte afbeelding, datum, titel, samenvatting) voor gebruik binnen een berichtenlijst — grid, masonry of kolom.
 *
 * Insert this inside a core/post-template so every loop in the theme renders the
 * same card. The card carries no layout of its own: the surrounding
 * post-template (or soli/masonry) decides the columns.
 *
 * @package Soli_Gutenberg_Theme
 */

// JSON-encoded (quotes included) because it sits inside the block comment attributes.
$soli_more_text = wp_json_encode( __( 'Lees meer →', 'soli-gutenberg-theme' ) );

?>
<!-- wp:group {"className":"is-style-soli-card","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"default"}} -->
<div class="wp-block-group is-style-soli-card">
	<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/10","style":{"border":{"radius":"var:custom|card-radius"}}} /-->
	<!-- wp:post-date {"format":"j F Y"} /-->
	<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"x-large"} /-->
	<!-- wp:post-excerpt {"moreText":<?php echo $soli_more_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- JSON-encoded literal. ?>,"excerptLength":25,"fontSize":"small"} /-->
</div>
<!-- /wp:group -->
