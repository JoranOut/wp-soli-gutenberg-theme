<?php
/**
 * Render callback for soli/post-search.
 *
 * A plain GET form. It carries no query logic of its own: submitting puts the
 * search term in the URL, and soli_gutenberg_theme_query_loop_search() in
 * functions.php injects that term into the Query Loop's WP_Query args.
 *
 * The form deliberately has no `action` attribute. A GET form without an action
 * submits to the current URL and *replaces* the query string, which conveniently
 * resets Query Loop pagination to page 1 on every new search.
 *
 * @package Soli_Gutenberg_Theme
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

$soli_param = isset( $attributes['paramName'] ) ? sanitize_key( $attributes['paramName'] ) : 'q';

if ( '' === $soli_param ) {
	$soli_param = 'q';
}

$soli_scope_param = $soli_param . '_type';
$soli_post_type   = isset( $attributes['postType'] ) ? sanitize_key( $attributes['postType'] ) : '';

// phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Public, read-only search form; no state is changed.
$soli_term = isset( $_GET[ $soli_param ] ) ? sanitize_text_field( wp_unslash( $_GET[ $soli_param ] ) ) : '';

$soli_show_label   = ! empty( $attributes['showLabel'] );
$soli_label        = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Zoeken', 'soli-gutenberg-theme' );
$soli_placeholder  = ! empty( $attributes['placeholder'] ) ? $attributes['placeholder'] : __( 'Zoeken…', 'soli-gutenberg-theme' );
$soli_button_text  = ! empty( $attributes['buttonText'] ) ? $attributes['buttonText'] : __( 'Zoeken', 'soli-gutenberg-theme' );
$soli_show_reset   = ! empty( $attributes['showReset'] ) && '' !== $soli_term;
$soli_input_id     = wp_unique_id( 'soli-post-search-' );

$soli_reset_url = '';
if ( $soli_show_reset && isset( $_SERVER['REQUEST_URI'] ) ) {
	$soli_reset_url = remove_query_arg(
		array( $soli_param, $soli_scope_param ),
		esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) )
	);
}

$soli_wrapper = get_block_wrapper_attributes( array( 'class' => 'soli-post-search' ) );
?>
<form <?php echo $soli_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?> role="search" method="get">
	<label
		class="soli-post-search__label<?php echo $soli_show_label ? '' : ' screen-reader-text'; ?>"
		for="<?php echo esc_attr( $soli_input_id ); ?>"
	><?php echo esc_html( $soli_label ); ?></label>

	<div class="soli-post-search__field">
		<?php if ( '' !== $soli_post_type ) : ?>
			<input type="hidden" name="<?php echo esc_attr( $soli_scope_param ); ?>" value="<?php echo esc_attr( $soli_post_type ); ?>" />
		<?php endif; ?>

		<input
			class="soli-post-search__input"
			id="<?php echo esc_attr( $soli_input_id ); ?>"
			type="search"
			name="<?php echo esc_attr( $soli_param ); ?>"
			value="<?php echo esc_attr( $soli_term ); ?>"
			placeholder="<?php echo esc_attr( $soli_placeholder ); ?>"
		/>
		<button class="soli-post-search__button" type="submit"><?php echo esc_html( $soli_button_text ); ?></button>
	</div>

	<?php if ( $soli_show_reset && '' !== $soli_reset_url ) : ?>
		<a class="soli-post-search__reset" href="<?php echo esc_url( $soli_reset_url ); ?>">
			<?php esc_html_e( 'Wis zoekopdracht', 'soli-gutenberg-theme' ); ?>
		</a>
	<?php endif; ?>
</form>
