<?php
/**
 * Render callback for soli/program-list.
 *
 * A list of works rendered as a two-column grid of pill items, each with a
 * maroon dot marker.
 *
 * @package Soli_Gutenberg_Theme
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

$soli_items = isset( $attributes['items'] ) && is_array( $attributes['items'] ) ? $attributes['items'] : array();

$soli_items = array_values(
	array_filter(
		array_map(
			static function ( $item ) {
				return trim( (string) $item );
			},
			$soli_items
		),
		static function ( $item ) {
			return '' !== $item;
		}
	)
);

if ( empty( $soli_items ) ) {
	return;
}

$soli_wrapper = get_block_wrapper_attributes( array( 'class' => 'soli-program-list' ) );
?>
<ul <?php echo $soli_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?>>
	<?php foreach ( $soli_items as $soli_item ) : ?>
		<li class="soli-program-list__item">
			<span class="soli-program-list__dot" aria-hidden="true"></span>
			<span class="soli-program-list__text"><?php echo esc_html( $soli_item ); ?></span>
		</li>
	<?php endforeach; ?>
</ul>
