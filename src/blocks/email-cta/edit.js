import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import {
	PanelBody,
	TextControl,
	TextareaControl,
	Modal,
	Button,
} from '@wordpress/components';
import { useState } from '@wordpress/element';

/**
 * Editor component for soli/email-cta.
 *
 * The button label is inline-editable; every mail field lives in the sidebar.
 * "Voorbeeld tonen" opens the WordPress Modal (dialog) component with a live
 * preview of the e-mail that visitors will see on the front end.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { buttonText, dialogTitle, to, cc, bcc, subject, body } = attributes;
	const [ isOpen, setOpen ] = useState( false );
	const blockProps = useBlockProps( { className: 'soli-email-cta' } );

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Dialoog', 'soli-gutenberg-theme' ) }>
					<TextControl
						label={ __( 'Titel van de dialoog', 'soli-gutenberg-theme' ) }
						value={ dialogTitle }
						onChange={ ( value ) => setAttributes( { dialogTitle: value } ) }
					/>
				</PanelBody>
				<PanelBody title={ __( 'E-mail', 'soli-gutenberg-theme' ) }>
					<TextControl
						label={ __( 'Aan', 'soli-gutenberg-theme' ) }
						type="email"
						value={ to }
						onChange={ ( value ) => setAttributes( { to: value } ) }
						placeholder="info@soli.nl"
					/>
					<TextControl
						label={ __( 'CC', 'soli-gutenberg-theme' ) }
						value={ cc }
						onChange={ ( value ) => setAttributes( { cc: value } ) }
					/>
					<TextControl
						label={ __( 'BCC', 'soli-gutenberg-theme' ) }
						value={ bcc }
						onChange={ ( value ) => setAttributes( { bcc: value } ) }
					/>
					<TextControl
						label={ __( 'Onderwerp', 'soli-gutenberg-theme' ) }
						value={ subject }
						onChange={ ( value ) => setAttributes( { subject: value } ) }
					/>
					<TextareaControl
						label={ __( 'Bericht', 'soli-gutenberg-theme' ) }
						value={ body }
						onChange={ ( value ) => setAttributes( { body: value } ) }
						rows={ 8 }
						help={ __(
							'Platte tekst. Regeleinden blijven behouden.',
							'soli-gutenberg-theme'
						) }
					/>
				</PanelBody>
			</InspectorControls>

			<div className="soli-email-cta__editor">
				<RichText
					tagName="span"
					className="soli-email-cta__button"
					allowedFormats={ [] }
					value={ buttonText }
					onChange={ ( value ) => setAttributes( { buttonText: value } ) }
					placeholder={ __( 'Knoptekst', 'soli-gutenberg-theme' ) }
				/>
				<Button
					variant="link"
					className="soli-email-cta__preview-toggle"
					onClick={ () => setOpen( true ) }
				>
					{ __( 'Voorbeeld tonen', 'soli-gutenberg-theme' ) }
				</Button>
			</div>

			{ isOpen && (
				<Modal
					title={ dialogTitle || __( 'Voorbeeld e-mail', 'soli-gutenberg-theme' ) }
					onRequestClose={ () => setOpen( false ) }
					className="soli-email-cta__modal"
				>
					<dl className="soli-email-cta__fields">
						<div className="soli-email-cta__field">
							<dt>{ __( 'Aan', 'soli-gutenberg-theme' ) }</dt>
							<dd>{ to || '-' }</dd>
						</div>
						{ cc && (
							<div className="soli-email-cta__field">
								<dt>{ __( 'CC', 'soli-gutenberg-theme' ) }</dt>
								<dd>{ cc }</dd>
							</div>
						) }
						{ bcc && (
							<div className="soli-email-cta__field">
								<dt>{ __( 'BCC', 'soli-gutenberg-theme' ) }</dt>
								<dd>{ bcc }</dd>
							</div>
						) }
						<div className="soli-email-cta__field">
							<dt>{ __( 'Onderwerp', 'soli-gutenberg-theme' ) }</dt>
							<dd>{ subject || '-' }</dd>
						</div>
					</dl>
					<div className="soli-email-cta__body">{ body }</div>
					<div className="soli-email-cta__actions">
						<Button variant="secondary" disabled>
							{ __( 'Kopieer naar klembord', 'soli-gutenberg-theme' ) }
						</Button>
						<Button variant="primary" disabled>
							{ __( 'Openen in mailprogramma', 'soli-gutenberg-theme' ) }
						</Button>
					</div>
				</Modal>
			) }
		</div>
	);
}
