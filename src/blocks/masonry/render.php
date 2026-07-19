<?php
/**
 * Render callback for soli/masonry.
 *
 * Wraps the serialized inner blocks (typically a core/query → post-template)
 * and exposes the column configuration to view.js via the Interactivity API.
 * The shortest-column packing itself happens on the front end.
 *
 * @package Soli_Gutenberg_Theme
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Rendered inner blocks.
 * @var WP_Block $block      Block instance.
 */

$soli_columns        = max( 1, absint( $attributes['columns'] ?? 3 ) );
$soli_columns_tablet = max( 1, absint( $attributes['columnsTablet'] ?? 2 ) );
$soli_columns_mobile = max( 1, absint( $attributes['columnsMobile'] ?? 1 ) );
$soli_gap            = max( 0, absint( $attributes['gap'] ?? 24 ) );

// Nothing to lay out (e.g. empty query): render the content untouched.
if ( '' === trim( (string) $content ) ) {
	return;
}

$soli_context = wp_json_encode(
	array(
		'columns'       => $soli_columns,
		'columnsTablet' => $soli_columns_tablet,
		'columnsMobile' => $soli_columns_mobile,
	)
);

$soli_style = sprintf(
	'--soli-masonry-gap:%dpx;--soli-masonry-columns:%d;--soli-masonry-columns-tablet:%d;--soli-masonry-columns-mobile:%d;',
	$soli_gap,
	$soli_columns,
	$soli_columns_tablet,
	$soli_columns_mobile
);

$soli_wrapper = get_block_wrapper_attributes(
	array(
		'class'               => 'soli-masonry',
		'style'               => $soli_style,
		'data-wp-interactive' => 'soli/masonry',
		'data-wp-context'     => $soli_context,
		'data-wp-init'        => 'callbacks.init',
		'data-wp-on-window--resize' => 'callbacks.onResize',
	)
);
?>
<div <?php echo $soli_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?>>
	<?php echo $content; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- inner block content, already escaped by the inner blocks' own render. ?>
</div>
