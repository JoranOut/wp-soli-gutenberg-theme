<?php
/**
 * Title: Footer
 * Slug: soli-gutenberg-theme/hidden-footer
 * Inserter: no
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|cream"}}}},"backgroundColor":"ink","textColor":"cream","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-cream-color has-ink-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--40)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"32%"} -->
		<div class="wp-block-column" style="flex-basis:32%">
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"},"style":{"spacing":{"blockGap":"0.75rem"}}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"44px","sizeSlug":"full"} -->
				<figure class="wp-block-image size-full is-resized"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/soli-logo-white.svg' ) ); ?>" alt="<?php esc_attr_e( 'Soli logo', 'soli-gutenberg-theme' ); ?>" style="width:44px"/></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
				<div class="wp-block-group">
					<!-- wp:paragraph {"fontFamily":"display","style":{"typography":{"fontSize":"20px","fontWeight":"700"}}} -->
					<p class="has-display-font-family" style="font-size:20px;font-weight:700">Muziekvereniging Soli</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontFamily":"sans","style":{"typography":{"fontSize":"11px","letterSpacing":"0.16em","textTransform":"uppercase"}}} -->
					<p class="has-sans-font-family" style="font-size:11px;letter-spacing:0.16em;text-transform:uppercase"><?php esc_html_e( 'Sinds 1909 · Driehuis', 'soli-gutenberg-theme' ); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"style":{"color":{"text":"#dcd6cd"},"typography":{"fontSize":"15px","lineHeight":"1.625"}}} -->
			<p class="has-text-color" style="color:#dcd6cd;font-size:15px;line-height:1.625"><?php esc_html_e( 'Al sinds 1909 is Soli een van de grootste en gezelligste verenigingen uit de omgeving. Welkom bij repetitie, les of concert.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":4,"textColor":"gold","fontFamily":"sans","style":{"typography":{"fontSize":"12px","letterSpacing":"0.16em","textTransform":"uppercase"}}} -->
			<h4 class="wp-block-heading has-gold-color has-text-color has-sans-font-family" style="font-size:12px;letter-spacing:0.16em;text-transform:uppercase"><?php esc_html_e( 'Vereniging', 'soli-gutenberg-theme' ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:list {"style":{"typography":{"fontSize":"14px"}}} -->
			<ul style="font-size:14px" class="wp-block-list">
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/' ) ); ?>"><?php esc_html_e( 'Over Soli', 'soli-gutenberg-theme' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/#lid-worden' ) ); ?>"><?php esc_html_e( 'Lid worden', 'soli-gutenberg-theme' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/muziekcentrum/' ) ); ?>"><?php esc_html_e( 'Muziekcentrum', 'soli-gutenberg-theme' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/vereniging/eregalerij/' ) ); ?>"><?php esc_html_e( 'Eregalerij', 'soli-gutenberg-theme' ); ?></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":4,"textColor":"gold","fontFamily":"sans","style":{"typography":{"fontSize":"12px","letterSpacing":"0.16em","textTransform":"uppercase"}}} -->
			<h4 class="wp-block-heading has-gold-color has-text-color has-sans-font-family" style="font-size:12px;letter-spacing:0.16em;text-transform:uppercase"><?php esc_html_e( 'Muziek maken', 'soli-gutenberg-theme' ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:list {"style":{"typography":{"fontSize":"14px"}}} -->
			<ul style="font-size:14px" class="wp-block-list">
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/orkesten-en-groepen/' ) ); ?>"><?php esc_html_e( 'Orkesten en groepen', 'soli-gutenberg-theme' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/lessen/' ) ); ?>"><?php esc_html_e( 'Muzieklessen', 'soli-gutenberg-theme' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/agenda/' ) ); ?>"><?php esc_html_e( 'Agenda', 'soli-gutenberg-theme' ); ?></a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/nieuws/' ) ); ?>"><?php esc_html_e( 'Nieuws', 'soli-gutenberg-theme' ); ?></a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"level":4,"textColor":"gold","fontFamily":"sans","style":{"typography":{"fontSize":"12px","letterSpacing":"0.16em","textTransform":"uppercase"}}} -->
			<h4 class="wp-block-heading has-gold-color has-text-color has-sans-font-family" style="font-size:12px;letter-spacing:0.16em;text-transform:uppercase"><?php esc_html_e( 'Contact', 'soli-gutenberg-theme' ); ?></h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0"}}},"fontSize":"small"} -->
			<p class="has-small-font-size" style="margin-top:0"><?php esc_html_e( 'Muziekcentrum Soli', 'soli-gutenberg-theme' ); ?><br><?php esc_html_e( 'Driehuis', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"fontSize":"small"} -->
			<p class="has-small-font-size"><?php esc_html_e( 'Opleidingen:', 'soli-gutenberg-theme' ); ?> <a href="mailto:opleidingen@soli.nl">opleidingen@soli.nl</a></p>
			<!-- /wp:paragraph -->

			<!-- wp:social-links {"iconColor":"ink","iconColorValue":"#1a1a2e","iconBackgroundColor":"cream","iconBackgroundColorValue":"#faf6ee","size":"has-small-icon-size"} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color has-icon-background-color">
				<!-- wp:social-link {"url":"https://www.facebook.com/Muziekvereniging-Soli-464559090251091/","service":"facebook"} /-->
			</ul>
			<!-- /wp:social-links -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"backgroundColor":"muted","className":"is-style-wide"} -->
	<hr class="wp-block-separator has-text-color has-muted-color has-alpha-channel-opacity has-muted-background-color has-background is-style-wide"/>
	<!-- /wp:separator -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( '© Muziekvereniging Soli. Alle rechten voorbehouden.', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>"><?php esc_html_e( 'Privacy', 'soli-gutenberg-theme' ); ?></a> · <a href="<?php echo esc_url( home_url( '/vereniging/in-veilige-handen/' ) ); ?>"><?php esc_html_e( 'In veilige handen', 'soli-gutenberg-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
