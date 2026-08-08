<?php
/**
 * Title: Vrienden van Soli-pagina
 * Slug: soli-gutenberg-theme/page-vrienden-van-soli
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de Vrienden van Soli-pagina: vriend worden, voordelen en de Vriendenloterij. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">Vrienden van Soli</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Bij Soli hebben we onze donateurs hoog in het vaandel. Daarom spreken we niet van donateurs, maar van Vrienden van Soli.</p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50)">
	<!-- wp:columns {"align":"wide","verticalAlignment":"center","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns alignwide are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading -->
			<h2 class="wp-block-heading">Wat krijg je ervoor terug?</h2>
			<!-- /wp:heading -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item --><li>Korting op ons jaarlijkse voorjaarsconcert</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>Minimaal drie keer per jaar informatie over Soli-activiteiten waarvoor je wordt uitgenodigd</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>Speciale acties, alleen voor onze vrienden</li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:paragraph -->
			<p>De jaarlijkse bijdrage is minimaal &euro; 15 &mdash; meer mag altijd. Je maakt de bijdrage over op IBAN NL45 RABO 0145 8564 96, t.n.v. Muziekvereniging Soli.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://www.soli.nl/wp-content/uploads/Aanmeldingsformulier-Vriend-van-Soli.docx"><?php esc_html_e( 'Word vriend van Soli →', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"large","className":"soli-card-media"} -->
			<figure class="wp-block-image size-large soli-card-media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/groepsfoto.jpg' ) ); ?>" alt="<?php esc_attr_e( 'De leden van Soli tijdens een concert voor hun vrienden en donateurs', 'soli-gutenberg-theme' ); ?>"/></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"className":"is-style-soli-card soli-card-ink","backgroundColor":"ink","textColor":"cream","layout":{"type":"default"}} -->
	<div class="wp-block-group is-style-soli-card soli-card-ink has-ink-background-color has-cream-color has-text-color has-background">
		<!-- wp:paragraph {"className":"soli-eyebrow-gold"} -->
		<p class="soli-eyebrow-gold"><?php esc_html_e( 'Liever kans op prijzen?', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( 'Steun Soli via de Vriendenloterij en maak zelf kans op mooie geldprijzen.', 'soli-gutenberg-theme' ); ?> <a href="https://bingonu.vriendenloterij.nl/speel-mee-em" rel="noopener"><?php esc_html_e( 'Speel mee via onze Vriendenloterij-pagina →', 'soli-gutenberg-theme' ); ?></a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
