<?php
/**
 * Title: Welkom en muzieklessen
 * Slug: soli-gutenberg-theme/home-welcome
 * Categories: soli, text
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","backgroundColor":"white","align":"full","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}},"border":{"top":{"color":"var:preset|color|line","width":"1px","style":"solid"},"bottom":{"color":"var:preset|color|line","width":"1px","style":"solid"}}},"anchor":"lid-worden"} -->
<section class="wp-block-group alignfull has-white-background-color has-background" id="lid-worden" style="border-top-color:var(--wp--preset--color--line);border-top-style:solid;border-top-width:1px;border-bottom-color:var(--wp--preset--color--line);border-bottom-style:solid;border-bottom-width:1px;padding-top:80px;padding-bottom:80px">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"3rem"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"style":{"typography":{"fontSize":"clamp(32px, 3.4vw, 48px)","lineHeight":"1.05"}}} -->
			<h2 class="wp-block-heading" style="font-size:clamp(32px, 3.4vw, 48px);line-height:1.05">Welkom bij Soli.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"soli-lead"} -->
			<p class="soli-lead">Denk je erover ook lid te worden van Soli? Als lid heb je geen hoge aanschafkosten voor een instrument. Ook krijg je een muziekopleiding via Soli met officieel erkende HaFaBra-diploma's. Maar bovenal heeft Soli het verenigingsleven hoog in het vaandel staan.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/vereniging/#lid-worden' ) ); ?>"><?php esc_html_e( 'Meld je aan →', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-outline-maroon"} -->
				<div class="wp-block-button is-style-outline-maroon"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/vereniging/' ) ); ?>"><?php esc_html_e( 'Over de vereniging', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:heading {"style":{"typography":{"fontSize":"clamp(32px, 3.4vw, 48px)","lineHeight":"1.05"}}} -->
			<h2 class="wp-block-heading" style="font-size:clamp(32px, 3.4vw, 48px);line-height:1.05">Leer een instrument bespelen.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"soli-lead"} -->
			<p class="soli-lead">Soli houdt vast aan een goede kwaliteit HaFaBra-opleiding door professionele docenten tegen een redelijk tarief. Voor kinderen én volwassenen: blokfluit, saxofoon, klarinet, trompet, slagwerk en meer.</p>
			<!-- /wp:paragraph -->

			<!-- wp:list {"className":"soli-two-col-list","style":{"typography":{"fontSize":"15px"}}} -->
			<ul style="font-size:15px" class="soli-two-col-list wp-block-list">
				<!-- wp:list-item --><li>Blokfluitklas</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>Opstapklas</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>Samenspelklas</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>Opleidingsorkest</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>Volwassenen-opstapklas</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>Slagwerkklas</li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"className":"is-style-outline-maroon"} -->
				<div class="wp-block-button is-style-outline-maroon"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/lessen/' ) ); ?>"><?php esc_html_e( 'Alle lessen en groepen →', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
