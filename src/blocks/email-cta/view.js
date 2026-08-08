/**
 * soli/email-cta — Interactivity API store.
 *
 * Opens/closes the native <dialog> as a modal and copies the plain-text
 * e-mail to the clipboard. The mailto: action is a real link handled by the
 * browser, so it needs no JavaScript.
 */
import { store, getContext, getElement } from '@wordpress/interactivity';

function getDialog( ref ) {
	return ref
		.closest( '.wp-block-soli-email-cta' )
		?.querySelector( '.soli-email-cta__dialog' );
}

const { actions } = store( 'soli/email-cta', {
	actions: {
		open() {
			const dialog = getDialog( getElement().ref );
			if ( dialog && typeof dialog.showModal === 'function' ) {
				dialog.showModal();
			}
		},
		close() {
			const dialog = getDialog( getElement().ref );
			dialog?.close();
		},
		onClose() {
			// Reset the copy feedback whenever the dialog is dismissed
			// (close button, Escape key, or backdrop).
			getContext().copied = false;
		},
		onBackdropClick( event ) {
			// The click listener sits on the <dialog>; a click that lands on
			// the element itself (not its content) is on the backdrop.
			if ( event.target === getElement().ref ) {
				event.target.close();
			}
		},
		*copy() {
			const context = getContext();
			try {
				yield navigator.clipboard.writeText( context.copyText );
				context.copied = true;
				yield new Promise( ( resolve ) => setTimeout( resolve, 2000 ) );
				context.copied = false;
			} catch ( e ) {
				// Clipboard unavailable (e.g. insecure context): stay silent.
			}
		},
	},
} );

export default actions;
