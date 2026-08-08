<?php
/**
 * Title: Mijn Soli (placeholder)
 * Slug: soli-gutenberg-theme/page-mijn-pagina
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de ledenpagina in mockup-stijl; mededelingen, nieuws en persoonlijke agenda worden later door Soli-plugins gevuld. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

$soli_spotlight_img  = get_theme_file_uri( 'assets/images/demo/groepen/blokfluit.jpg' );
$soli_feature_meded  = get_theme_file_uri( 'assets/images/demo/groepen/groepsfoto.jpg' );

$soli_mededelingen = array(
	array( 'Solikrant #77, juni 2026', 'De nieuwste editie van ons verenigingsblad is uit.' ),
	array( 'Coronacrisis', 'Actuele afspraken rond repetities en optredens.' ),
	array( 'Een nieuw verfje', 'Het Soli Muziekcentrum krijgt een frisse uitstraling.' ),
);
$soli_mijn_agenda  = array(
	array( 'vr 15.08.26', 'Repetitie IJmuider Symfonie', '20:00 · Muziekcentrum Soli' ),
	array( 'vr 22.08.26', 'Repetitie IJmuider Symfonie', '20:00 · Muziekcentrum Soli' ),
	array( 'vr 22.08.26', 'Funband repetitie', '19:30 · Muziekcentrum Soli' ),
	array( 'za 24.08.26', 'CUZ meeting', '10:00 · Bestuurskamer' ),
	array( 'wo 28.08.26', 'Muzieklessen starten', 'Muziekcentrum Soli' ),
);
$soli_orkesten     = array(
	array( 'Slagwerkgroep', '🗓️ di · 19:30', '/orkesten-en-groepen/slagwerkgroep/' ),
	array( 'Funband', '🗓️ 1× per 3 weken', '/orkesten-en-groepen/funband/' ),
	array( 'Marsorkest', '🗓️ op afspraak', '/orkesten-en-groepen/marsorkest/' ),
	array( 'Harmonie', '🗓️ ma · 20:00', '/orkesten-en-groepen/harmonie-orkest/' ),
	array( 'Opleidingsorkest', '🗓️ vr · 18:45', '/orkesten-en-groepen/opleidingsorkest/' ),
);
?>
<!-- wp:group {"tagName":"section","gradient":"maroon-fade","align":"full","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<section class="wp-block-group alignfull has-white-color has-maroon-fade-gradient-background has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"},"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}},"fontFamily":"sans","fontSize":"small"} -->
	<div class="wp-block-group alignwide has-sans-font-family has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--40)">
		<!-- wp:paragraph -->
		<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Website', 'soli-gutenberg-theme' ); ?></a> · <a href="#mijn-agenda"><?php esc_html_e( 'Mijn agenda', 'soli-gutenberg-theme' ); ?></a></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><a href="<?php echo esc_url( wp_logout_url( home_url() ) ); ?>"><?php esc_html_e( 'Uitloggen', 'soli-gutenberg-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center","justifyContent":"space-between"},"style":{"spacing":{"blockGap":"1.3rem"}}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"},"style":{"spacing":{"blockGap":"1.3rem"}}} -->
		<div class="wp-block-group">
			<!-- wp:group {"className":"soli-avatar","layout":{"type":"default"}} -->
			<div class="wp-block-group soli-avatar">
				<!-- wp:paragraph -->
				<p>JO</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.15rem"}}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"className":"soli-mp-hi"} -->
				<p class="soli-mp-hi"><?php esc_html_e( 'Welkom terug,', 'soli-gutenberg-theme' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":1,"textColor":"white","style":{"typography":{"fontSize":"clamp(30px, 4vw, 46px)","lineHeight":"1"}}} -->
				<h1 class="wp-block-heading has-white-color has-text-color" style="font-size:clamp(30px, 4vw, 46px);line-height:1">Joran Out</h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"soli-mp-email","fontSize":"small"} -->
				<p class="soli-mp-email has-small-font-size">info@joranout.nl</p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"soli-stat"} -->
			<p class="soli-stat"><strong>5</strong> <?php esc_html_e( 'orkesten', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"soli-stat"} -->
			<p class="soli-stat"><strong>ma · 20:00</strong> <?php esc_html_e( 'volgende repetitie', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"className":"soli-stat"} -->
			<p class="soli-stat"><strong>3</strong> <?php esc_html_e( 'nieuwe mededelingen', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","className":"soli-quicklinks","style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"wrap"},"fontSize":"small","fontFamily":"sans"} -->
	<div class="wp-block-group alignwide soli-quicklinks has-sans-font-family has-small-font-size" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:paragraph --><p>📄 <a href="#"><?php esc_html_e( 'Statuten', 'soli-gutenberg-theme' ); ?></a></p><!-- /wp:paragraph -->
		<!-- wp:paragraph --><p>📄 <a href="#"><?php esc_html_e( 'Huishoudelijk reglement', 'soli-gutenberg-theme' ); ?></a></p><!-- /wp:paragraph -->
		<!-- wp:paragraph --><p>📄 <a href="#"><?php esc_html_e( 'Vijfjarenplan', 'soli-gutenberg-theme' ); ?></a></p><!-- /wp:paragraph -->
		<!-- wp:paragraph --><p>🔗 <a href="#mijn-agenda"><?php esc_html_e( 'Taken overzicht', 'soli-gutenberg-theme' ); ?></a></p><!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"blockGap":"var:preset|spacing|60"}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<?php // Spotlight — next rehearsal. Placeholder: comes from wp-soli-event-plugin. ?>
	<!-- wp:group {"align":"wide","className":"soli-spotlight","layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center","justifyContent":"space-between"}} -->
	<div class="wp-block-group alignwide soli-spotlight">
		<div class="soli-spotlight-img" style="background-image:url('<?php echo esc_url( $soli_spotlight_img ); ?>')" aria-hidden="true"></div>

		<!-- wp:group {"className":"soli-spotlight-body","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.4rem"}}} -->
		<div class="wp-block-group soli-spotlight-body">
			<!-- wp:paragraph {"className":"soli-eyebrow-gold"} -->
			<p class="soli-eyebrow-gold"><?php esc_html_e( 'Volgende op je agenda', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"level":2,"textColor":"white","style":{"typography":{"fontSize":"clamp(24px, 3vw, 34px)","lineHeight":"1.05"}}} -->
			<h2 class="wp-block-heading has-white-color has-text-color" style="font-size:clamp(24px, 3vw, 34px);line-height:1.05">Repetitie IJmuider Symfonie</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"soli-spotlight-meta","fontSize":"small"} -->
			<p class="soli-spotlight-meta has-small-font-size">Vrijdag 15 augustus · 20:00 · Muziekcentrum Soli</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:buttons {"className":"soli-spotlight-cta"} -->
		<div class="wp-block-buttons soli-spotlight-cta">
			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#mijn-agenda"><?php esc_html_e( 'In agenda →', 'soli-gutenberg-theme' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->

	<?php // Mededelingen — placeholder: delivered by a Soli plugin. ?>
	<!-- wp:group {"align":"wide","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"level":2,"fontSize":"xx-large"} -->
		<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Mijn mededelingen', 'soli-gutenberg-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40","top":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-columns">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"className":"is-style-soli-card soli-mp-feature","style":{"spacing":{"blockGap":"0","padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"default"}} -->
				<div class="wp-block-group is-style-soli-card soli-mp-feature" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:image {"aspectRatio":"16/9","scale":"cover","className":"soli-mp-feature-media"} -->
					<figure class="wp-block-image soli-mp-feature-media"><img src="<?php echo esc_url( $soli_feature_meded ); ?>" alt="" style="aspect-ratio:16/9;object-fit:cover"/></figure>
					<!-- /wp:image -->

					<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
					<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
						<!-- wp:heading {"level":3,"fontSize":"x-large"} -->
						<h3 class="wp-block-heading has-x-large-font-size">Documenten ALV 2026-03</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph -->
						<p>De agenda en notulen voor de voorjaars-ALV staan voor je klaar.</p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"className":"soli-lees-meer"} -->
						<p class="soli-lees-meer"><a href="#"><?php esc_html_e( 'Lees meer →', 'soli-gutenberg-theme' ); ?></a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:group {"layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
				<div class="wp-block-group">
					<?php foreach ( $soli_mededelingen as $soli_item ) : ?>
					<!-- wp:group {"className":"is-style-soli-card soli-mp-mini","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
					<div class="wp-block-group is-style-soli-card soli-mp-mini">
						<!-- wp:heading {"level":3,"style":{"typography":{"fontSize":"19px","lineHeight":"1.2"}}} -->
						<h3 class="wp-block-heading" style="font-size:19px;line-height:1.2"><?php echo esc_html( $soli_item[0] ); ?></h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"fontSize":"small"} -->
						<p class="has-small-font-size"><?php echo esc_html( $soli_item[1] ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"className":"soli-lees-meer"} -->
						<p class="soli-lees-meer"><a href="#"><?php esc_html_e( 'Lees meer →', 'soli-gutenberg-theme' ); ?></a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
					<?php endforeach; ?>
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->

	<?php // Nieuws — the latest club posts; the member plugin will later filter this query on the member's groups. ?>
	<!-- wp:group {"align":"wide","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"level":2,"fontSize":"xx-large"} -->
		<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Mijn nieuws', 'soli-gutenberg-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|40","top":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-columns">
			<!-- wp:column -->
			<div class="wp-block-column">
				<!-- wp:query {"query":{"perPage":1,"postType":"post","order":"desc","orderBy":"date","inherit":false},"className":"soli-mp-feature-query"} -->
				<div class="wp-block-query soli-mp-feature-query">
					<!-- wp:post-template -->
						<!-- wp:group {"className":"is-style-soli-card soli-mp-feature","style":{"spacing":{"blockGap":"0","padding":{"top":"0","right":"0","bottom":"0","left":"0"}}},"layout":{"type":"default"}} -->
						<div class="wp-block-group is-style-soli-card soli-mp-feature" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
							<!-- wp:post-featured-image {"isLink":true,"aspectRatio":"16/9","className":"soli-mp-feature-media"} /-->

							<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","padding":{"top":"var:preset|spacing|40","right":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"default"}} -->
							<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
								<!-- wp:post-date {"format":"j F Y"} /-->

								<!-- wp:post-title {"isLink":true,"level":3,"fontSize":"x-large"} /-->

								<!-- wp:post-excerpt {"moreText":"Lees meer →","excerptLength":30} /-->
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
					<!-- wp:post-template {"layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}}} -->
						<!-- wp:group {"className":"is-style-soli-card soli-mp-mini","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
						<div class="wp-block-group is-style-soli-card soli-mp-mini">
							<!-- wp:post-date {"format":"j F Y"} /-->

							<!-- wp:post-title {"isLink":true,"level":3,"style":{"typography":{"fontSize":"20px","lineHeight":"1.2"}}} /-->

							<!-- wp:post-excerpt {"moreText":"Lees meer →","excerptLength":18,"fontSize":"small"} /-->
						</div>
						<!-- /wp:group -->
					<!-- /wp:post-template -->
				</div>
				<!-- /wp:query -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","align":"full","backgroundColor":"sand","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}}} -->
<section class="wp-block-group alignfull has-sand-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
	<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":2,"fontSize":"xx-large"} -->
		<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Steun Soli', 'soli-gutenberg-theme' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph -->
		<p><?php esc_html_e( 'Het sponsoren van Soli kan tegenwoordig ook gratis! SponsorKliks zorgt ervoor dat een commissie van je bestelling bij webshops naar Soli gaat. Het kost niks, maar levert de club veel op!', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p><?php
		printf(
			/* translators: %s: link to become a friend of Soli. */
			esc_html__( 'Steun je Soli liever direct? Word %s of kijk op onze webshop voor de nieuwste mogelijkheden.', 'soli-gutenberg-theme' ),
			'<a href="' . esc_url( home_url( '/vereniging/vrienden-van-soli/' ) ) . '">' . esc_html__( 'vriend van Soli', 'soli-gutenberg-theme' ) . '</a>'
		);
		?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"anchor":"mijn-agenda"} -->
<section class="wp-block-group" id="mijn-agenda" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"62%"} -->
		<div class="wp-block-column" style="flex-basis:62%">
			<!-- wp:heading {"level":2,"fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-xx-large-font-size"><?php esc_html_e( 'Mijn agenda', 'soli-gutenberg-theme' ); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:group {"className":"soli-agenda-list","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0","margin":{"top":"var:preset|spacing|30"}}}} -->
			<div class="wp-block-group soli-agenda-list" style="margin-top:var(--wp--preset--spacing--30)">
				<?php foreach ( $soli_mijn_agenda as $soli_row ) : ?>
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"1.25rem"}}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"className":"soli-agenda-date"} -->
					<p class="soli-agenda-date"><?php echo esc_html( $soli_row[0] ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"className":"soli-agenda-body","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.25rem"}}} -->
					<div class="wp-block-group soli-agenda-body">
						<!-- wp:paragraph {"fontFamily":"display","style":{"typography":{"fontSize":"19px","lineHeight":"1.15"}}} -->
						<p class="has-display-font-family" style="font-size:19px;line-height:1.15"><?php echo esc_html( $soli_row[1] ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"fontSize":"small","textColor":"muted"} -->
						<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html( $soli_row[2] ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"soli-flat-panel","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
			<div class="wp-block-group soli-flat-panel">
				<!-- wp:heading {"level":2,"textColor":"maroon","className":"soli-flat-panel-title","style":{"typography":{"fontSize":"20px"}}} -->
				<h2 class="wp-block-heading soli-flat-panel-title has-maroon-color has-text-color" style="font-size:20px"><?php esc_html_e( 'Mijn orkesten', 'soli-gutenberg-theme' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:list {"className":"soli-orkesten-list"} -->
				<ul class="wp-block-list soli-orkesten-list">
					<?php foreach ( $soli_orkesten as $soli_groep ) : ?>
					<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( $soli_groep[2] ) ); ?>"><span class="soli-ork-name"><?php echo esc_html( $soli_groep[0] ); ?></span><span class="soli-ork-meet"><?php echo esc_html( $soli_groep[1] ); ?></span></a></li><!-- /wp:list-item -->
					<?php endforeach; ?>
				</ul>
				<!-- /wp:list -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"className":"soli-details","layout":{"type":"default"}} -->
			<div class="wp-block-group soli-details">
				<!-- wp:details {"summary":"Vertrouwenspersonen"} -->
				<details class="wp-block-details"><summary><?php esc_html_e( 'Vertrouwenspersonen', 'soli-gutenberg-theme' ); ?></summary>
					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size"><?php esc_html_e( 'Voor vertrouwelijke zaken kun je terecht bij onze vertrouwenspersonen.', 'soli-gutenberg-theme' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"fontSize":"small"} -->
					<p class="has-small-font-size"><strong>Marieke de Vries</strong><br><a href="mailto:vertrouwenspersoon@soli.nl">vertrouwenspersoon@soli.nl</a></p>
					<!-- /wp:paragraph -->
				</details>
				<!-- /wp:details -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
