<?php
/**
 * Title: Agenda-teaser (placeholder)
 * Slug: soli-gutenberg-theme/home-agenda-teaser
 * Categories: soli
 * Description: “Binnenkort in de agenda” met voorbeeldrijen; wordt later vervangen door soli/event-view-list.
 *
 * @package Soli_Gutenberg_Theme
 */

$soli_events = array(
	array( 'za 15.08.26', 'Repetitie IJmuider Symfonie', 'Enkele blazers van Soli, aangevuld met strijkers uit de regio repeteren o.l.v. Sjoerd Haver.' ),
	array( 'za 22.08.26', 'Repetitie IJmuider Symfonie', 'Voorbereiding op de uitvoering van de IJmuider Symfonie op 30 augustus.' ),
	array( 'ma 24.08.26', 'CUZ meeting', 'Bijeenkomst van alle contactpersonen (Commissie Uitvoerende Zaken).' ),
	array( 'vr 28.08.26', 'Muziek op schoot — korte cursus', 'Nadere informatie volgt.' ),
	array( 'za 30.08.26', 'Uitvoering IJmuider Symfonie', 'Slotconcert van de zomer — avondvullend programma in het Muziekcentrum.' ),
);
?>
<!-- wp:group {"tagName":"section","backgroundColor":"paper","layout":{"type":"constrained"},"align":"full","style":{"spacing":{"padding":{"top":"80px","bottom":"80px"}},"border":{"top":{"color":"var:preset|color|line","width":"1px","style":"solid"},"bottom":{"color":"var:preset|color|line","width":"1px","style":"solid"}}}} -->
<section class="wp-block-group alignfull has-paper-background-color has-background" style="border-top-color:var(--wp--preset--color--line);border-top-style:solid;border-top-width:1px;border-bottom-color:var(--wp--preset--color--line);border-bottom-style:solid;border-bottom-width:1px;padding-top:80px;padding-bottom:80px">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"3rem"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"36%"} -->
		<div class="wp-block-column" style="flex-basis:36%">
			<!-- wp:paragraph {"className":"soli-eyebrow"} -->
			<p class="soli-eyebrow"><?php esc_html_e( 'Agenda', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:heading {"style":{"spacing":{"margin":{"top":"20px"}}}} -->
			<h2 class="wp-block-heading" style="margin-top:20px">Binnenkort in de agenda.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"className":"soli-lead"} -->
			<p class="soli-lead">Repetities, concerten en muzikale momenten — bekijk wat er de komende weken op het programma staat.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/agenda/' ) ); ?>"><?php esc_html_e( 'Volledige agenda →', 'soli-gutenberg-theme' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"soli-agenda-list","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
			<div class="wp-block-group soli-agenda-list">
				<?php foreach ( $soli_events as $soli_event ) : ?>
				<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"1rem"}}} -->
				<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
					<!-- wp:paragraph {"className":"soli-agenda-date"} -->
					<p class="soli-agenda-date"><?php echo esc_html( $soli_event[0] ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:group {"className":"soli-agenda-body","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0.25rem"}}} -->
					<div class="wp-block-group soli-agenda-body">
						<!-- wp:paragraph {"fontFamily":"display","style":{"typography":{"fontSize":"19px","lineHeight":"1.15"}}} -->
						<p class="has-display-font-family" style="font-size:19px;line-height:1.15"><?php echo esc_html( $soli_event[1] ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:paragraph {"fontSize":"small","textColor":"muted"} -->
						<p class="has-muted-color has-text-color has-small-font-size"><?php echo esc_html( $soli_event[2] ); ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->

			<!-- wp:paragraph {"className":"soli-placeholder-note"} -->
			<p class="soli-placeholder-note"><?php esc_html_e( 'Voorbeeldweergave — wordt vervangen door soli/event-view-list (wp-soli-event-plugin).', 'soli-gutenberg-theme' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</section>
<!-- /wp:group -->
