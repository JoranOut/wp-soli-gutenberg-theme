<?php
/**
 * Title: Header
 * Slug: soli-gutenberg-theme/hidden-header
 * Inserter: no
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"className":"soli-header","style":{"color":{"background":"var:preset|color|cream"},"border":{"bottom":{"color":"var:preset|color|line","width":"1px","style":"solid"}},"spacing":{"padding":{"top":"20px","bottom":"20px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group soli-header" style="border-bottom-color:var(--wp--preset--color--line);border-bottom-style:solid;border-bottom-width:1px;background-color:var(--wp--preset--color--cream);padding-top:20px;padding-bottom:20px">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"0.75rem"}}} -->
		<div class="wp-block-group">
			<?php // Explicit logo mark (no site logo is set in the DB); mirrors the footer. ?>
			<!-- wp:image {"width":"48px","sizeSlug":"full","className":"soli-logo"} -->
			<figure class="wp-block-image size-full is-resized soli-logo"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/soli-logo.svg' ) ); ?>" alt="<?php esc_attr_e( 'Soli logo', 'soli-gutenberg-theme' ); ?>" style="width:48px"/></figure>
			<!-- /wp:image -->
			<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:site-title {"level":0} /-->
				<!-- wp:site-tagline {"style":{"typography":{"fontSize":"11px","letterSpacing":"0.18em","textTransform":"uppercase"}},"textColor":"muted","fontFamily":"sans"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"1.5rem"}}} -->
		<div class="wp-block-group">

			<?php // Placeholder: to be replaced by the mega-menu blocks from wp-soli-menu-blocks-plugin (soli/mega-panel). ?>
			<?php // The "Word lid" navigation-link is hidden on desktop (CSS) and only surfaces inside the mobile overlay, mirroring the standalone button below. ?>
			<!-- wp:navigation {"overlayMenu":"mobile","layout":{"type":"flex","justifyContent":"right"}} -->
				<!-- wp:page-list /-->
				<!-- wp:navigation-link {"label":"<?php echo esc_attr_x( 'Word lid', 'nav', 'soli-gutenberg-theme' ); ?>","url":"<?php echo esc_url( home_url( '/vereniging/#lid-worden' ) ); ?>","kind":"custom","className":"soli-mobile-cta"} /-->
			<!-- /wp:navigation -->

			<!-- wp:buttons {"className":"soli-header-cta"} -->
			<div class="wp-block-buttons soli-header-cta">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/vereniging/#lid-worden' ) ); ?>"><?php esc_html_e( 'Word lid', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
