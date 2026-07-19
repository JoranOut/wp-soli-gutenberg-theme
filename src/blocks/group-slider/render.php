<?php
/**
 * Render callback for soli/group-slider.
 *
 * Wraps the inner soli/group-card tiles in the slider chrome (viewport,
 * shutters, prev/next, status, chip navigation) and wires the
 * Interactivity API directives.
 *
 * @package Soli_Gutenberg_Theme
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Rendered inner blocks (the tiles).
 * @var WP_Block $block      Block instance.
 */

$soli_autoplay = max( 0, absint( $attributes['autoplay'] ?? 5000 ) );

// Chip labels: the page titles of the inner group cards, in order.
$soli_chips = array();
foreach ( $block->parsed_block['innerBlocks'] ?? array() as $soli_inner ) {
	if ( 'soli/group-card' !== ( $soli_inner['blockName'] ?? '' ) ) {
		continue;
	}
	$soli_chip_page = get_post( absint( $soli_inner['attrs']['pageId'] ?? 0 ) );
	if ( $soli_chip_page && 'publish' === $soli_chip_page->post_status ) {
		$soli_chips[] = get_the_title( $soli_chip_page );
	}
}

if ( count( $soli_chips ) < 2 ) {
	// Not enough slides for a slider: render the tiles as a plain row.
	echo '<div ' . get_block_wrapper_attributes( array( 'class' => 'soli-slider is-static' ) ) . '><div class="soli-slider-viewport"><div class="soli-slider-track">' . $content . '</div></div></div>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner block content.
	return;
}

$soli_context = wp_json_encode(
	array(
		'page'      => 0,
		'page1'     => 1,
		'pageCount' => 1,
		'perView'   => 1,
		'first'     => 0,
		'pending'   => 0,
		'closing'   => false,
		'busy'      => false,
		'variation' => 0,
		'autoplay'  => $soli_autoplay,
	)
);

$soli_wrapper = get_block_wrapper_attributes(
	array(
		'class'                     => 'soli-slider',
		'data-wp-interactive'       => 'soli/group-slider',
		'data-wp-context'           => $soli_context,
		'data-wp-init'              => 'callbacks.init',
		'data-wp-on-window--resize' => 'callbacks.onResize',
		'data-wp-on--mouseenter'    => 'actions.pause',
		'data-wp-on--mouseleave'    => 'actions.resume',
		'data-wp-on--touchstart'    => 'callbacks.onTouchStart',
		'data-wp-on--touchend'      => 'callbacks.onTouchEnd',
		'data-wp-on--transitionend' => 'callbacks.onShutterEnd',
		'data-wp-class--is-closing' => 'context.closing',
	)
);
?>
<div <?php echo $soli_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?>>
	<div class="soli-slider-viewport">
		<div class="soli-slider-track"><?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner block content. ?></div>
		<div class="soli-shutters" aria-hidden="true"><span class="soli-shutter top"></span><span class="soli-shutter bottom"></span></div>
	</div>

	<button type="button" class="soli-slider-btn prev" aria-label="<?php esc_attr_e( 'Vorige', 'soli-gutenberg-theme' ); ?>" data-wp-on--click="actions.prev">‹</button>
	<button type="button" class="soli-slider-btn next" aria-label="<?php esc_attr_e( 'Volgende', 'soli-gutenberg-theme' ); ?>" data-wp-on--click="actions.next">›</button>

	<div class="soli-slider-status"><span class="soli-slider-current" data-wp-text="context.page1">1</span> / <span class="soli-slider-total" data-wp-text="context.pageCount">1</span></div>

	<div class="soli-slider-nav">
		<?php foreach ( $soli_chips as $soli_index => $soli_chip ) : ?>
			<button type="button" class="soli-slider-chip" data-wp-context='<?php echo esc_attr( wp_json_encode( array( 'index' => $soli_index ) ) ); ?>' data-wp-on--click="actions.goToChip" data-wp-class--is-active="state.chipActive"><?php echo esc_html( $soli_chip ); ?></button>
		<?php endforeach; ?>
	</div>
</div>
