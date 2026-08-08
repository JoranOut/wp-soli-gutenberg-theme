<?php
/**
 * Title: Groepensectie met kaarten
 * Slug: soli-gutenberg-theme/group-section
 * Categories: soli
 * Description: Sectiekop met een raster van groepskaarten. Dupliceer een kaart en kies de (kind-)pagina van de groep.
 *
 * @package Soli_Gutenberg_Theme
 */

?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|30"}}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--30)">
	<!-- wp:group {"layout":{"type":"constrained","contentSize":"720px","justifyContent":"left"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group">
		<!-- wp:heading -->
		<h2 class="wp-block-heading">Orkesten</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"textColor":"muted"} -->
		<p class="has-muted-color has-text-color">Soli beschikt over een breed scala aan eindorkesten. Samen representeren ze bijna alle vormen van muziek, van jazz en klassiek tot lichte muziek.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"grid","minimumColumnWidth":"230px"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"}}} -->
	<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--40)">
		<!-- wp:soli/group-card /-->
		<!-- wp:soli/group-card /-->
		<!-- wp:soli/group-card /-->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
