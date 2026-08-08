<?php
/**
 * Title: JAT-pagina
 * Slug: soli-gutenberg-theme/page-jat
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de JAT-pagina (Jeugd Activiteiten Team): wat het JAT organiseert en hoe je ze bereikt. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">JAT</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"className":"soli-page-lede"} -->
	<p class="soli-page-lede">Het JAT &mdash; voluit het Jeugd Activiteiten Team &mdash; is de jeugdcommissie van Soli. Zij organiseren voor de jeugdleden precies die dingen die helemaal niets met repeteren te maken hebben.</p>
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
			<h2 class="wp-block-heading">Wat organiseert het JAT zoal?</h2>
			<!-- /wp:heading -->

			<!-- wp:list -->
			<ul class="wp-block-list">
				<!-- wp:list-item --><li>Spelletjesmiddagen</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>Cluedoavonden</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>Disco</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>Zwemuitjes</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>Speurtochten</li><!-- /wp:list-item -->
				<!-- wp:list-item --><li>En natuurlijk: het <strong>jeugdweekend</strong></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->

			<!-- wp:paragraph -->
			<p><?php esc_html_e( 'Meer weten over wat er aankomt? Houd de aankondigingen in het Solicentrum goed in de gaten.', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"sizeSlug":"large","className":"soli-card-media"} -->
			<figure class="wp-block-image size-large soli-card-media"><img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/demo/trumpet-kids.jpg' ) ); ?>" alt="<?php esc_attr_e( 'Jeugdleden van Soli hebben plezier tijdens een JAT-activiteit', 'soli-gutenberg-theme' ); ?>"/></figure>
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
		<p class="soli-eyebrow-gold"><?php esc_html_e( 'Vragen of ideeën?', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"fontSize":"small"} -->
		<p class="has-small-font-size"><?php esc_html_e( 'Mail naar', 'soli-gutenberg-theme' ); ?> <a href="mailto:jatsoli@gmail.com">jatsoli@gmail.com</a>. <?php esc_html_e( 'Groetjes van het JAT: Tim, Jeroen, Lizzy, Angela, Marlies en Irene.', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
