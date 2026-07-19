import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, TextControl, ToggleControl } from '@wordpress/components';

/**
 * Editor component for soli/flyer-callout.
 *
 * Inline-editable eyebrow, title and call-to-action. The link target is set in
 * the block sidebar.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { eyebrow, title, cta, url, opensInNewTab } = attributes;
	const blockProps = useBlockProps( { className: 'soli-flyer-callout' } );

	return (
		<div { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Link', 'soli-gutenberg-theme' ) }>
					<TextControl
						label={ __( 'URL', 'soli-gutenberg-theme' ) }
						value={ url }
						onChange={ ( value ) => setAttributes( { url: value } ) }
						type="url"
						placeholder="https://"
					/>
					<ToggleControl
						label={ __( 'In nieuw tabblad openen', 'soli-gutenberg-theme' ) }
						checked={ opensInNewTab }
						onChange={ ( value ) => setAttributes( { opensInNewTab: value } ) }
					/>
				</PanelBody>
			</InspectorControls>
			<span className="soli-flyer-callout__link">
				<RichText
					tagName="span"
					className="soli-flyer-callout__eyebrow"
					allowedFormats={ [] }
					value={ eyebrow }
					onChange={ ( value ) => setAttributes( { eyebrow: value } ) }
					placeholder={ __( 'Label', 'soli-gutenberg-theme' ) }
				/>
				<RichText
					tagName="span"
					className="soli-flyer-callout__title"
					allowedFormats={ [] }
					value={ title }
					onChange={ ( value ) => setAttributes( { title: value } ) }
					placeholder={ __( 'Titel', 'soli-gutenberg-theme' ) }
				/>
				<RichText
					tagName="span"
					className="soli-flyer-callout__cta"
					allowedFormats={ [] }
					value={ cta }
					onChange={ ( value ) => setAttributes( { cta: value } ) }
					placeholder={ __( 'Oproep', 'soli-gutenberg-theme' ) }
				/>
			</span>
		</div>
	);
}
