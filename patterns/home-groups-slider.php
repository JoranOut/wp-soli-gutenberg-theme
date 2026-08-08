<?php
/**
 * Title: Orkesten en groepen slider
 * Slug: soli-gutenberg-theme/home-groups-slider
 * Categories: soli, gallery
 * Block Types: soli/group-slider
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","backgroundColor":"cream","align":"full","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}}}} -->
<section class="wp-block-group alignfull has-cream-background-color has-background" style="padding-top:80px;padding-bottom:80px">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group">
			<!-- wp:heading -->
			<h2 class="wp-block-heading">Van harmonie tot bigband, van opstapklas tot TwirlTeam.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"soli-lead"} -->
			<p class="soli-lead">Bij Soli vindt iedereen een plek, van je allereerste noten in de opleiding tot spelen in een van onze eindorkesten.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline-maroon"} -->
			<div class="wp-block-button is-style-outline-maroon"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/orkesten-en-groepen/' ) ); ?>"><?php esc_html_e( 'Alle orkesten en groepen →', 'soli-gutenberg-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"default"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--50)">
		<!-- wp:soli/group-slider -->
			<!-- wp:soli/group-card /-->
			<!-- wp:soli/group-card /-->
			<!-- wp:soli/group-card /-->
			<!-- wp:soli/group-card /-->
		<!-- /wp:soli/group-slider -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
