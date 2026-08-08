<?php
/**
 * Render callback for soli/email-cta.
 *
 * A button that opens a native <dialog> with a ready-made example e-mail. The
 * dialog offers two actions: copy the message to the clipboard (Interactivity
 * API) and open it in the visitor's mail client (a plain mailto: link, so it
 * works without JavaScript).
 *
 * @package Soli_Gutenberg_Theme
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

$soli_button   = trim( (string) ( $attributes['buttonText'] ?? '' ) );
$soli_dtitle   = trim( (string) ( $attributes['dialogTitle'] ?? '' ) );
$soli_to       = trim( (string) ( $attributes['to'] ?? '' ) );
$soli_cc        = trim( (string) ( $attributes['cc'] ?? '' ) );
$soli_bcc       = trim( (string) ( $attributes['bcc'] ?? '' ) );
$soli_subject   = trim( (string) ( $attributes['subject'] ?? '' ) );
$soli_body      = (string) ( $attributes['body'] ?? '' );

if ( '' === $soli_button ) {
	return;
}

// Build the mailto: link. The address stays as-is; the headers are encoded
// per RFC 3986 (spaces as %20, newlines as %0A) so mail clients parse them.
$soli_params = array();
if ( '' !== $soli_cc ) {
	$soli_params['cc'] = $soli_cc;
}
if ( '' !== $soli_bcc ) {
	$soli_params['bcc'] = $soli_bcc;
}
if ( '' !== $soli_subject ) {
	$soli_params['subject'] = $soli_subject;
}
if ( '' !== $soli_body ) {
	$soli_params['body'] = $soli_body;
}
$soli_query   = empty( $soli_params ) ? '' : '?' . http_build_query( $soli_params, '', '&', PHP_QUERY_RFC3986 );
$soli_mailto  = 'mailto:' . rawurlencode( $soli_to );
// rawurlencode() would escape the "@" too; restore it for a valid address.
$soli_mailto  = str_replace( '%40', '@', $soli_mailto ) . $soli_query;

// Plain-text version copied to the clipboard.
$soli_lines = array();
if ( '' !== $soli_to ) {
	$soli_lines[] = __( 'Aan', 'soli-gutenberg-theme' ) . ': ' . $soli_to;
}
if ( '' !== $soli_cc ) {
	$soli_lines[] = __( 'CC', 'soli-gutenberg-theme' ) . ': ' . $soli_cc;
}
if ( '' !== $soli_bcc ) {
	$soli_lines[] = __( 'BCC', 'soli-gutenberg-theme' ) . ': ' . $soli_bcc;
}
if ( '' !== $soli_subject ) {
	$soli_lines[] = __( 'Onderwerp', 'soli-gutenberg-theme' ) . ': ' . $soli_subject;
}
$soli_copy = implode( "\n", $soli_lines );
if ( '' !== $soli_body ) {
	$soli_copy .= ( '' !== $soli_copy ? "\n\n" : '' ) . $soli_body;
}

$soli_context = wp_json_encode(
	array(
		'copied'   => false,
		'copyText' => $soli_copy,
	)
);

$soli_wrapper = get_block_wrapper_attributes(
	array(
		'class'               => 'soli-email-cta',
		'data-wp-interactive' => 'soli/email-cta',
		'data-wp-context'     => $soli_context,
	)
);
?>
<div <?php echo $soli_wrapper; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped by get_block_wrapper_attributes(). ?>>
	<button type="button" class="soli-email-cta__button" data-wp-on--click="actions.open">
		<?php echo esc_html( $soli_button ); ?>
	</button>

	<dialog class="soli-email-cta__dialog" data-wp-on--close="actions.onClose" data-wp-on--click="actions.onBackdropClick">
		<div class="soli-email-cta__dialog-inner">
			<header class="soli-email-cta__dialog-head">
				<?php if ( '' !== $soli_dtitle ) : ?>
					<h2 class="soli-email-cta__dialog-title"><?php echo esc_html( $soli_dtitle ); ?></h2>
				<?php endif; ?>
				<button
					type="button"
					class="soli-email-cta__close"
					data-wp-on--click="actions.close"
					aria-label="<?php esc_attr_e( 'Sluiten', 'soli-gutenberg-theme' ); ?>"
				>&times;</button>
			</header>

			<dl class="soli-email-cta__fields">
				<div class="soli-email-cta__field">
					<dt><?php esc_html_e( 'Aan', 'soli-gutenberg-theme' ); ?></dt>
					<dd><?php echo esc_html( $soli_to ); ?></dd>
				</div>
				<?php if ( '' !== $soli_cc ) : ?>
					<div class="soli-email-cta__field">
						<dt><?php esc_html_e( 'CC', 'soli-gutenberg-theme' ); ?></dt>
						<dd><?php echo esc_html( $soli_cc ); ?></dd>
					</div>
				<?php endif; ?>
				<?php if ( '' !== $soli_bcc ) : ?>
					<div class="soli-email-cta__field">
						<dt><?php esc_html_e( 'BCC', 'soli-gutenberg-theme' ); ?></dt>
						<dd><?php echo esc_html( $soli_bcc ); ?></dd>
					</div>
				<?php endif; ?>
				<?php if ( '' !== $soli_subject ) : ?>
					<div class="soli-email-cta__field">
						<dt><?php esc_html_e( 'Onderwerp', 'soli-gutenberg-theme' ); ?></dt>
						<dd><?php echo esc_html( $soli_subject ); ?></dd>
					</div>
				<?php endif; ?>
			</dl>

			<?php if ( '' !== trim( $soli_body ) ) : ?>
				<div class="soli-email-cta__body"><?php echo esc_html( $soli_body ); ?></div>
			<?php endif; ?>

			<footer class="soli-email-cta__actions">
				<button type="button" class="soli-email-cta__copy" data-wp-on--click="actions.copy">
					<span data-wp-bind--hidden="context.copied"><?php esc_html_e( 'Kopieer naar klembord', 'soli-gutenberg-theme' ); ?></span>
					<span hidden data-wp-bind--hidden="!context.copied"><?php esc_html_e( 'Gekopieerd!', 'soli-gutenberg-theme' ); ?></span>
				</button>
				<a class="soli-email-cta__mailto" href="<?php echo esc_url( $soli_mailto, array( 'mailto' ) ); ?>">
					<?php esc_html_e( 'Openen in mailprogramma', 'soli-gutenberg-theme' ); ?>
				</a>
			</footer>
		</div>
	</dialog>
</div>
