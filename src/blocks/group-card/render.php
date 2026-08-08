<?php
/**
 * Render callback for soli/group-card.
 *
 * Two faces: the default overview card (og-card) and, inside the
 * soli/group-slider (context soli/displayMode = tile), a slider tile.
 *
 * @package Soli_Gutenberg_Theme
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

$soli_page_id = absint( $attributes['pageId'] ?? 0 );
$soli_page    = $soli_page_id ? get_post( $soli_page_id ) : null;

if ( ! $soli_page || 'publish' !== $soli_page->post_status ) {
	// Visitors see nothing; editors get a visible stand-in so a card without
	// a page can't ship unnoticed.
	if ( ! current_user_can( 'edit_posts' ) ) {
		return;
	}
	$soli_wrapper = get_block_wrapper_attributes( array( 'class' => 'soli-og-card soli-og-card--unlinked' ) );
	?>
	<div <?php echo $soli_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?>>
		<span class="soli-og-card-body">
			<span class="soli-og-card-name"><?php esc_html_e( 'Groepskaart zonder pagina', 'soli-gutenberg-theme' ); ?></span>
			<span class="soli-og-card-tag"><?php esc_html_e( 'Kies een gepubliceerde pagina in de editor. Bezoekers zien deze kaart niet.', 'soli-gutenberg-theme' ); ?></span>
		</span>
	</div>
	<?php
	return;
}

$soli_name      = get_the_title( $soli_page );
$soli_url       = get_permalink( $soli_page );
$soli_tagline   = get_the_excerpt( $soli_page );
$soli_image     = get_the_post_thumbnail_url( $soli_page, 'large' );
$soli_rehearsal = trim( $attributes['rehearsal'] ?? '' );
$soli_is_tile   = 'tile' === ( $block->context['soli/displayMode'] ?? '' );

if ( $soli_is_tile ) {
	$soli_wrapper = get_block_wrapper_attributes( array( 'class' => 'soli-tile' ) );
	?>
	<a <?php echo $soli_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?> href="<?php echo esc_url( $soli_url ); ?>">
		<span class="soli-tile-inner">
			<span class="soli-tile-img"<?php echo $soli_image ? ' style="background-image:url(\'' . esc_url( $soli_image ) . '\')"' : ''; ?>></span>
			<span class="soli-tile-cap">
				<span class="soli-tile-name"><?php echo esc_html( $soli_name ); ?></span>
				<?php if ( $soli_rehearsal ) : ?>
					<span class="soli-tile-meet soli-ic soli-ic-cal"><?php echo esc_html( $soli_rehearsal ); ?></span>
				<?php endif; ?>
			</span>
		</span>
	</a>
	<?php
	return;
}

$soli_wrapper = get_block_wrapper_attributes( array( 'class' => 'soli-og-card' ) );
?>
<a <?php echo $soli_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?> href="<?php echo esc_url( $soli_url ); ?>">
	<span class="soli-og-card-img"<?php echo $soli_image ? ' style="background-image:url(\'' . esc_url( $soli_image ) . '\')"' : ''; ?> role="img" aria-label="<?php echo esc_attr( $soli_name ); ?>"></span>
	<span class="soli-og-card-body">
		<?php if ( $soli_rehearsal ) : ?>
			<span class="soli-og-card-meta soli-ic soli-ic-cal"><?php echo esc_html( $soli_rehearsal ); ?></span>
		<?php endif; ?>
		<span class="soli-og-card-name"><?php echo esc_html( $soli_name ); ?></span>
		<?php if ( $soli_tagline ) : ?>
			<span class="soli-og-card-tag"><?php echo esc_html( $soli_tagline ); ?></span>
		<?php endif; ?>
		<?php if ( ! empty( $attributes['showArrow'] ) ) : ?>
			<span class="soli-og-card-arrow" aria-hidden="true">→</span>
		<?php endif; ?>
	</span>
</a>
