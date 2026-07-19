<?php
/**
 * Render callback for soli/post-nav.
 *
 * Two navigation cards: the previous (older) and next (newer) post, each with a
 * label, the post title and its date. Only renders on singular views that have
 * an adjacent post.
 *
 * @package Soli_Gutenberg_Theme
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

if ( ! is_singular() ) {
	return;
}

$soli_prev = get_previous_post();
$soli_next = get_next_post();

if ( empty( $soli_prev ) && empty( $soli_next ) ) {
	return;
}

$soli_prev_label = trim( (string) ( $attributes['prevLabel'] ?? '' ) );
$soli_next_label = trim( (string) ( $attributes['nextLabel'] ?? '' ) );

$soli_wrapper = get_block_wrapper_attributes( array( 'class' => 'soli-post-nav' ) );
?>
<nav <?php echo $soli_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?> aria-label="<?php esc_attr_e( 'Berichtnavigatie', 'soli-gutenberg-theme' ); ?>">
	<?php if ( $soli_prev ) : ?>
		<a class="soli-post-nav__card soli-post-nav__card--prev" href="<?php echo esc_url( get_permalink( $soli_prev ) ); ?>">
			<span class="soli-post-nav__label">&larr; <?php echo esc_html( $soli_prev_label ); ?></span>
			<span class="soli-post-nav__title"><?php echo esc_html( get_the_title( $soli_prev ) ); ?></span>
			<span class="soli-post-nav__date"><?php echo esc_html( get_the_date( 'j F Y', $soli_prev ) ); ?></span>
		</a>
	<?php else : ?>
		<span class="soli-post-nav__card soli-post-nav__card--empty" aria-hidden="true"></span>
	<?php endif; ?>

	<?php if ( $soli_next ) : ?>
		<a class="soli-post-nav__card soli-post-nav__card--next" href="<?php echo esc_url( get_permalink( $soli_next ) ); ?>">
			<span class="soli-post-nav__label"><?php echo esc_html( $soli_next_label ); ?> &rarr;</span>
			<span class="soli-post-nav__title"><?php echo esc_html( get_the_title( $soli_next ) ); ?></span>
			<span class="soli-post-nav__date"><?php echo esc_html( get_the_date( 'j F Y', $soli_next ) ); ?></span>
		</a>
	<?php else : ?>
		<span class="soli-post-nav__card soli-post-nav__card--empty" aria-hidden="true"></span>
	<?php endif; ?>
</nav>
