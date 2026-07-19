<?php
/**
 * Render callback for soli/concert-details.
 *
 * A labeled facts table: each row is a <th> label and a <td> value.
 * Values may contain inline markup (line breaks, a muted sub-line) and are
 * sanitised with wp_kses_post().
 *
 * @package Soli_Gutenberg_Theme
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

$soli_rows = isset( $attributes['rows'] ) && is_array( $attributes['rows'] ) ? $attributes['rows'] : array();

// Drop rows without a label or value.
$soli_rows = array_values(
	array_filter(
		$soli_rows,
		static function ( $row ) {
			return is_array( $row )
				&& '' !== trim( (string) ( $row['label'] ?? '' ) )
				&& '' !== trim( (string) ( $row['value'] ?? '' ) );
		}
	)
);

if ( empty( $soli_rows ) ) {
	return;
}

$soli_wrapper = get_block_wrapper_attributes( array( 'class' => 'soli-concert-details' ) );
?>
<div <?php echo $soli_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?>>
	<table class="soli-concert-details-table">
		<tbody>
			<?php foreach ( $soli_rows as $soli_row ) : ?>
				<tr>
					<th scope="row"><?php echo esc_html( (string) $soli_row['label'] ); ?></th>
					<td><?php echo wp_kses_post( (string) $soli_row['value'] ); ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
