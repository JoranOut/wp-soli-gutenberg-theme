<?php
/**
 * Render callback for soli/flyer-callout.
 *
 * A prominent link card: eyebrow label, title and a call-to-action, wrapped in
 * a single anchor.
 *
 * @package Soli_Gutenberg_Theme
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

$soli_eyebrow = trim( (string) ( $attributes['eyebrow'] ?? '' ) );
$soli_title   = trim( (string) ( $attributes['title'] ?? '' ) );
$soli_cta     = trim( (string) ( $attributes['cta'] ?? '' ) );
$soli_url     = trim( (string) ( $attributes['url'] ?? '' ) );
$soli_newtab  = ! empty( $attributes['opensInNewTab'] );

if ( '' === $soli_title && '' === $soli_cta ) {
	return;
}

$soli_wrapper = get_block_wrapper_attributes( array( 'class' => 'soli-flyer-callout' ) );
$soli_rel     = $soli_newtab ? ' target="_blank" rel="noopener noreferrer"' : '';
?>
<div <?php echo $soli_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?>>
	<a class="soli-flyer-callout__link" href="<?php echo esc_url( $soli_url ); ?>"<?php echo $soli_rel; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static string. ?>>
		<?php if ( '' !== $soli_eyebrow ) : ?>
			<span class="soli-flyer-callout__eyebrow"><?php echo esc_html( $soli_eyebrow ); ?></span>
		<?php endif; ?>
		<?php if ( '' !== $soli_title ) : ?>
			<span class="soli-flyer-callout__title"><?php echo esc_html( $soli_title ); ?></span>
		<?php endif; ?>
		<?php if ( '' !== $soli_cta ) : ?>
			<span class="soli-flyer-callout__cta"><?php echo esc_html( $soli_cta ); ?></span>
		<?php endif; ?>
	</a>
</div>
