<?php
/**
 * Title: Steun Soli / boeken
 * Slug: soli-gutenberg-theme/cta-booking
 * Categories: soli, call-to-action
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","backgroundColor":"paper","align":"full","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}}}} -->
<section class="wp-block-group alignfull has-paper-background-color has-background" style="padding-top:80px;padding-bottom:80px">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"3rem"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading -->
			<h2 class="wp-block-heading">Geen feest als Soli niet is geweest.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"soli-lead"} -->
			<p class="soli-lead">Het sponsoren van Soli kan tegenwoordig ook gratis: via Sponsorkliks gaat een commissie van je bestelling bij webshops naar Soli. Het kost niks, maar levert de club veel op. Steun je Soli liever direct? Word vriend van Soli of kijk op onze webshop.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/steun/' ) ); ?>"><?php esc_html_e( 'Steun Soli →', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline-maroon"} -->
				<div class="wp-block-button is-style-outline-maroon"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Boek Soli voor uw feest', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"large","className":"soli-card-media"} -->
			<figure class="wp-block-image size-large soli-card-media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/trumpet-kids.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Jonge muzikanten van Soli tijdens een repetitie', 'soli-gutenberg-theme' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
