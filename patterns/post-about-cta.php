<?php
/**
 * Title: Over Soli — afbeelding met tekst en cta
 * Slug: soli-gutenberg-theme/post-about-cta
 * Categories: soli
 * Description: Afbeelding naast een korte uitleg over Soli met links en een oproep om lid te worden, voor onderaan een aankondiging.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:media-text {"mediaId":0,"mediaType":"image","className":"soli-about-block","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-media-text alignwide is-stacked-on-mobile soli-about-block" style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60)">
	<figure class="wp-block-media-text__media">
		<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/trumpet-kids.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Jonge muzikanten proberen een trompet uit', 'soli-gutenberg-theme' ); ?>"/>
	</figure>
	<div class="wp-block-media-text__content">
		<!-- wp:heading {"level":2} -->
		<h2 class="wp-block-heading"><?php esc_html_e( 'Waarom Soli?', 'soli-gutenberg-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Bij Soli leer je al vanaf jonge leeftijd een instrument bespelen en speel je al snel samen in een van onze orkesten. Ook volwassenen kunnen (weer) beginnen. De lessen worden in huis gegeven door gediplomeerde docenten, en een instrument krijg je van de vereniging in bruikleen.', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons -->
		<div class="wp-block-buttons">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/vereniging/#lid-worden' ) ); ?>"><?php esc_html_e( 'Alles over lid worden →', 'soli-gutenberg-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
</div>
<!-- /wp:media-text -->
