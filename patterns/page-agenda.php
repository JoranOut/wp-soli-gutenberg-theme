<?php
/**
 * Title: Agendapagina (placeholder)
 * Slug: soli-gutenberg-theme/page-agenda
 * Categories: soli, page
 * Block Types: core/post-content
 * Post Types: page
 * Description: Startinhoud voor de agendapagina: maandkalender- en lijstweergave als voorbeeld; wordt vervangen door wp-soli-event-plugin. Gebruik het paginacanvas-sjabloon.
 *
 * @package Soli_Gutenberg_Theme
 */

$soli_days   = array( 'ma', 'di', 'wo', 'do', 'vr', 'za', 'zo' );
$soli_agenda = array(
	array( 'za 15.08.26', 'Repetitie IJmuider Symfonie', '20:00 · Muziekcentrum Soli' ),
	array( 'za 22.08.26', 'Repetitie IJmuider Symfonie', '20:00 · Muziekcentrum Soli' ),
	array( 'za 22.08.26', 'Funband repetitie', '19:30 · Muziekcentrum Soli' ),
	array( 'ma 24.08.26', 'CUZ meeting', '10:00 · Bestuurskamer' ),
	array( 'vr 28.08.26', 'Muzieklessen starten', 'Muziekcentrum Soli' ),
	array( 'za 30.08.26', 'Uitvoering IJmuider Symfonie', '20:00 · Muziekcentrum Soli' ),
);

// Simple August 2026 mock month: 31 days, starting on a Saturday (col 6).
$soli_weeks  = array();
$soli_cells  = array_fill( 0, 5, '' );
$soli_events = array(
	15 => 'Repetitie',
	22 => 'Repetitie · Funband',
	24 => 'CUZ',
	28 => 'Muzieklessen',
	30 => 'Concert',
);
for ( $soli_day = 1; $soli_day <= 31; $soli_day++ ) {
	$soli_cells[] = $soli_day;
}
$soli_cells = array_pad( $soli_cells, 42, '' );
$soli_weeks = array_chunk( $soli_cells, 7 );
?>
<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|20"}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--60)">
	<!-- wp:paragraph {"className":"soli-eyebrow"} -->
	<p class="soli-eyebrow"><?php esc_html_e( 'Concerten en repetities', 'soli-gutenberg-theme' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:heading {"level":1,"fontSize":"huge","className":"soli-page-title"} -->
	<h1 class="wp-block-heading has-huge-font-size soli-page-title">Agenda</h1>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"textColor":"muted"} -->
	<p class="has-muted-color has-text-color">Repetities, concerten en muzikale momenten. Bekijk wat er op het programma staat.</p>
	<!-- /wp:paragraph -->
</section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","layout":{"type":"constrained"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|60"},"blockGap":"var:preset|spacing|50"}}} -->
<section class="wp-block-group" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60)">
	<!-- wp:group {"align":"wide","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:heading {"level":2,"fontSize":"x-large"} -->
			<h2 class="wp-block-heading has-x-large-font-size">Augustus 2026</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontFamily":"sans","fontSize":"small","textColor":"muted"} -->
			<p class="has-muted-color has-text-color has-sans-font-family has-small-font-size">‹ vorige · vandaag · volgende ›</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->

		<!-- wp:table {"className":"is-style-stripes soli-cal-placeholder","fontSize":"small"} -->
		<figure class="wp-block-table is-style-stripes soli-cal-placeholder has-small-font-size"><table><thead><tr>
			<?php foreach ( $soli_days as $soli_d ) : ?><th><?php echo esc_html( $soli_d ); ?></th><?php endforeach; ?>
		</tr></thead><tbody>
			<?php foreach ( $soli_weeks as $soli_week ) : ?>
			<tr>
				<?php foreach ( $soli_week as $soli_cell ) : ?>
				<td><?php
				if ( '' !== $soli_cell ) {
					echo esc_html( (string) $soli_cell );
					if ( isset( $soli_events[ $soli_cell ] ) ) {
						echo '<br><strong>' . esc_html( $soli_events[ $soli_cell ] ) . '</strong>';
					}
				}
				?></td>
				<?php endforeach; ?>
			</tr>
			<?php endforeach; ?>
		</tbody></table></figure>
		<!-- /wp:table -->

		<!-- wp:paragraph {"className":"soli-placeholder-note"} -->
		<p class="soli-placeholder-note"><?php esc_html_e( 'Voorbeeldweergave, wordt vervangen door soli/event-view-calendar (wp-soli-event-plugin).', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:group {"align":"wide","layout":{"type":"default"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
	<div class="wp-block-group alignwide">
		<!-- wp:heading {"level":2,"fontSize":"x-large"} -->
		<h2 class="wp-block-heading has-x-large-font-size">Volledige agenda</h2>
		<!-- /wp:heading -->

		<!-- wp:group {"className":"soli-agenda-list","layout":{"type":"default"},"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-group soli-agenda-list">
			<?php foreach ( $soli_agenda as $soli_row ) : ?>
			<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"},"blockGap":"1rem"}}} -->
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

		<!-- wp:paragraph {"className":"soli-placeholder-note"} -->
		<p class="soli-placeholder-note"><?php esc_html_e( 'Voorbeeldweergave, wordt vervangen door soli/event-view-list (wp-soli-event-plugin).', 'soli-gutenberg-theme' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</section>
<!-- /wp:group -->
