<?php
/**
 * Title: Laatste nieuws
 * Slug: soli-gutenberg-theme/home-news
 * Categories: soli, query
 * Block Types: core/query
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","backgroundColor":"sand","align":"full","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}},"border":{"top":{"color":"var:preset|color|line","width":"1px","style":"solid"}}}} -->
<section class="wp-block-group alignfull has-sand-background-color has-background" style="border-top-color:var(--wp--preset--color--line);border-top-style:solid;border-top-width:1px;padding-top:80px;padding-bottom:80px">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"soli-eyebrow"} -->
			<p class="soli-eyebrow"><?php esc_html_e( 'Laatste nieuws', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading -->
			<h2 class="wp-block-heading">Vers van de repetitie en het podium.</h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button {"className":"is-style-outline-maroon"} -->
			<div class="wp-block-button is-style-outline-maroon"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/nieuws/' ) ); ?>"><?php esc_html_e( 'Meer nieuws →', 'soli-gutenberg-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"},"blockGap":{"left":"var:preset|spacing|40"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:var(--wp--preset--spacing--50)">
		<!-- wp:column {"width":"66%"} -->
		<div class="wp-block-column" style="flex-basis:66%">
			<!-- wp:query {"query":{"perPage":1,"postType":"post","order":"desc","orderBy":"date","inherit":false}} -->
			<div class="wp-block-query">
				<!-- wp:post-template -->
					<!-- wp:group {"className":"is-style-soli-card soli-news-feature","style":{"spacing":{"blockGap":"0","padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"default"}} -->
					<div class="wp-block-group is-style-soli-card soli-news-feature" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9"} /-->

						<!-- wp:group {"layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}}} -->
						<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
							<!-- wp:post-date {"format":"j F Y"} /-->
							<!-- wp:post-title {"isLink":true,"level":3,"style":{"typography":{"fontSize":"26px"}}} /-->
							<!-- wp:post-excerpt {"moreText":"Lees meer →","excerptLength":28} /-->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->
				<!-- /wp:post-template -->

				<!-- wp:query-no-results -->
					<!-- wp:pattern {"slug":"soli-gutenberg-theme/hidden-no-results"} /-->
				<!-- /wp:query-no-results -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:query {"query":{"perPage":3,"offset":1,"postType":"post","order":"desc","orderBy":"date","inherit":false}} -->
			<div class="wp-block-query">
				<!-- wp:post-template {"layout":{"type":"default"}} -->
					<!-- wp:group {"className":"is-style-soli-card soli-news-small","style":{"spacing":{"blockGap":"0.4rem"}},"layout":{"type":"default"}} -->
					<div class="wp-block-group is-style-soli-card soli-news-small">
						<!-- wp:post-date {"format":"j F Y"} /-->
						<!-- wp:post-title {"isLink":true,"level":3,"style":{"typography":{"fontSize":"19px"}}} /-->
						<!-- wp:post-excerpt {"moreText":"Lees meer →","excerptLength":16,"fontSize":"small"} /-->
					</div>
					<!-- /wp:group -->
				<!-- /wp:post-template -->
			</div>
			<!-- /wp:query -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
