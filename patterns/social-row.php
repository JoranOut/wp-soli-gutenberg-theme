<?php
/**
 * Title: Social media rij (placeholder)
 * Slug: soli-gutenberg-theme/social-row
 * Categories: soli
 *
 * @package Soli_Gutenberg_Theme
 */

$soli_socials = array(
	array( 'Instagram', 'Volle bak bij het zomerconcert! 🎺', '♥ 142', 'funband.jpg' ),
	array( 'Facebook', 'Nieuwe aanwas bij de opleiding', '👍 96', 'trumpet-kids.jpg' ),
	array( 'Instagram', 'Trots op onze jongste muzikanten', '♥ 210', 'groepsfoto.jpg' ),
	array( 'Instagram', 'Wat een concert gisteravond!', '♥ 305', 'harmonie-concours.jpg' ),
);
?>
<!-- wp:group {"tagName":"section","backgroundColor":"sand","align":"full","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"bottom":"80px"}}}} -->
<section class="wp-block-group alignfull has-sand-background-color has-background" style="padding-bottom:80px">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns alignwide">
		<?php foreach ( $soli_socials as $soli_social ) : ?>
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"is-style-soli-card soli-social-card","style":{"spacing":{"blockGap":"0","padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"default"}} -->
			<div class="wp-block-group is-style-soli-card soli-social-card" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/' . $soli_social[3] ) ); ?>","dimRatio":0,"minHeight":345,"contentPosition":"top left","isUserOverlayColor":true} -->
				<div class="wp-block-cover has-custom-content-position is-position-top-left" style="min-height:345px">
					<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span>
					<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/' . $soli_social[3] ) ); ?>" data-object-fit="cover"/>
					<div class="wp-block-cover__inner-container">
						<!-- wp:paragraph {"className":"soli-social-badge"} -->
						<p class="soli-social-badge"><?php echo esc_html( $soli_social[0] ); ?></p>
						<!-- /wp:paragraph -->
					</div>
				</div>
				<!-- /wp:cover -->

				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"top"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","right":"var:preset|spacing|30","bottom":"var:preset|spacing|20","left":"var:preset|spacing|30"}}}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"fontFamily":"sans","fontSize":"small"} -->
					<p class="has-sans-font-family has-small-font-size"><?php echo esc_html( $soli_social[1] ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"textColor":"maroon","fontFamily":"sans","fontSize":"x-small"} -->
					<p class="has-maroon-color has-text-color has-sans-font-family has-x-small-font-size"><?php echo esc_html( $soli_social[2] ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
		<?php endforeach; ?>
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
