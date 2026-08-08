<?php
/**
 * Title: Hero met concertaankondiging
 * Slug: soli-gutenberg-theme/hero-concert
 * Categories: soli, banner
 * Viewport Width: 1400
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:cover {"url":"<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/harmonie-concours.jpg' ) ); ?>","dimRatio":100,"customGradient":"linear-gradient(120deg,rgba(26,26,46,0.88) 0%,rgba(26,26,46,0.55) 55%,rgba(26,26,46,0.3) 100%)","isUserOverlayColor":true,"minHeight":780,"contentPosition":"bottom left","align":"full","className":"soli-hero","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"80px","bottom":"112px"}}}} -->
<div class="wp-block-cover alignfull has-custom-content-position is-position-bottom-left soli-hero" style="padding-top:80px;padding-bottom:112px;min-height:780px">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(120deg,rgba(26,26,46,0.88) 0%,rgba(26,26,46,0.55) 55%,rgba(26,26,46,0.3) 100%)"></span>
	<img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/harmonie-concours.jpg' ) ); ?>" data-object-fit="cover"/>
	<div class="wp-block-cover__inner-container">
		<!-- wp:columns {"verticalAlignment":"bottom","align":"wide","style":{"spacing":{"blockGap":{"left":"48px"}}}} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-bottom">
			<!-- wp:column {"verticalAlignment":"bottom","width":"58%"} -->
			<div class="wp-block-column is-vertically-aligned-bottom" style="flex-basis:58%">
				<!-- wp:paragraph {"className":"soli-eyebrow-gold"} -->
				<p class="soli-eyebrow-gold"><?php esc_html_e( 'Volgende concert', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-hero-title"} -->
				<h1 class="wp-block-heading soli-hero-title has-huge-font-size">De IJmuider<br><em>Symfonie.</em></h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"soli-hero-lede","style":{"color":{"text":"#e7e0d2"},"typography":{"fontSize":"18px","lineHeight":"1.625"}}} -->
				<p class="soli-hero-lede has-text-color" style="color:#e7e0d2;font-size:18px;line-height:1.625">Enkele blazers van Soli, aangevuld met strijkers uit de regio, repeteren o.l.v. Sjoerd Haver voor de uitvoering van de IJmuider Symfonie: een avondvullend programma voor iedereen die van orkestmuziek houdt.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons -->
				<div class="wp-block-buttons">
					<!-- wp:button {"className":"is-style-gold-cta"} -->
					<div class="wp-block-button is-style-gold-cta"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/agenda/' ) ); ?>"><?php esc_html_e( 'Kaarten & agenda →', 'soli-gutenberg-theme' ); ?></a></div>
					<!-- /wp:button -->

					<!-- wp:button {"textColor":"cream","className":"is-style-outline-maroon","style":{"border":{"color":"var:preset|color|cream"}}} -->
					<div class="wp-block-button is-style-outline-maroon"><a class="wp-block-button__link has-cream-color has-text-color has-border-color wp-element-button" style="border-color:var(--wp--preset--color--cream)" href="<?php echo esc_url( home_url( '/vereniging/#lid-worden' ) ); ?>"><?php esc_html_e( 'Word lid van Soli', 'soli-gutenberg-theme' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">
				<!-- wp:group {"className":"soli-program-card","backgroundColor":"cream","textColor":"ink","layout":{"type":"default"},"style":{"border":{"color":"var:preset|color|gold","width":"1px","style":"solid","radius":"var:custom|card-radius"},"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|20"},"elements":{"link":{"color":{"text":"var:preset|color|gold"}}}}} -->
				<div class="wp-block-group soli-program-card has-border-color has-cream-background-color has-ink-color has-text-color has-background has-link-color" style="border-color:var(--wp--preset--color--gold);border-style:solid;border-width:1px;border-radius:var(--wp--custom--card-radius);padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
					<!-- wp:paragraph {"className":"soli-program-eyebrow"} -->
					<p class="soli-program-eyebrow"><?php esc_html_e( 'Concertprogramma', 'soli-gutenberg-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontFamily":"display","style":{"typography":{"fontSize":"24px"}}} -->
					<p class="has-display-font-family" style="font-size:24px">Zaterdag 30 augustus 2026</p>
					<!-- /wp:paragraph -->

					<!-- wp:separator {"backgroundColor":"line"} -->
					<hr class="wp-block-separator has-text-color has-line-color has-alpha-channel-opacity has-line-background-color has-background"/>
					<!-- /wp:separator -->

					<!-- wp:group {"className":"soli-program-rows","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.55rem"}}} -->
					<div class="wp-block-group soli-program-rows">
						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
						<div class="wp-block-group">
							<!-- wp:paragraph {"className":"soli-program-label"} --><p class="soli-program-label"><?php esc_html_e( 'Dag', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
							<!-- wp:paragraph {"fontSize":"small"} --><p class="has-small-font-size">Zaterdag</p><!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
						<div class="wp-block-group">
							<!-- wp:paragraph {"className":"soli-program-label"} --><p class="soli-program-label"><?php esc_html_e( 'Aanvang', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
							<!-- wp:paragraph {"fontSize":"small"} --><p class="has-small-font-size">20:00 uur</p><!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
						<div class="wp-block-group">
							<!-- wp:paragraph {"className":"soli-program-label"} --><p class="soli-program-label"><?php esc_html_e( 'Locatie', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
							<!-- wp:paragraph {"fontSize":"small"} --><p class="has-small-font-size">Muziekcentrum Soli<br><span style="color:var(--wp--preset--color--muted)">Driehuis</span></p><!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->

						<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
						<div class="wp-block-group">
							<!-- wp:paragraph {"className":"soli-program-label"} --><p class="soli-program-label"><?php esc_html_e( 'Dirigent', 'soli-gutenberg-theme' ); ?></p><!-- /wp:paragraph -->
							<!-- wp:paragraph {"fontSize":"small"} --><p class="has-small-font-size">Sjoerd Haver</p><!-- /wp:paragraph -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:group -->

					<!-- wp:paragraph {"className":"soli-program-link"} -->
					<p class="soli-program-link"><a href="<?php echo esc_url( home_url( '/agenda/' ) ); ?>"><?php esc_html_e( 'Volledige agenda →', 'soli-gutenberg-theme' ); ?></a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
</div>
<!-- /wp:cover -->
