<?php
/**
 * Title: 404
 * Slug: soli-gutenberg-theme/hidden-404
 * Inserter: no
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"layout":{"type":"constrained","contentSize":"620px"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}}} -->
<div class="wp-block-group">
	<!-- wp:paragraph {"align":"center","className":"soli-eyebrow"} -->
	<p class="has-text-align-center soli-eyebrow">404</p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1,"textAlign":"center","fontSize":"xx-large"} -->
	<h1 class="wp-block-heading has-text-align-center has-xx-large-font-size"><?php esc_html_e( 'Deze pagina is niet gevonden', 'soli-gutenberg-theme' ); ?></h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","textColor":"muted"} -->
	<p class="has-text-align-center has-muted-color has-text-color"><?php esc_html_e( 'De pagina die je zoekt bestaat niet (meer), of staat nog op de planning.', 'soli-gutenberg-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
	<div class="wp-block-buttons">
		<!-- wp:button -->
		<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Naar de homepage', 'soli-gutenberg-theme' ); ?></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->

	<!-- wp:search {"label":"Zoeken","showLabel":false,"placeholder":"Zoeken…","buttonText":"Zoeken"} /-->
</div>
<!-- /wp:group -->
