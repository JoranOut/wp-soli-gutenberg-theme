import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

/**
 * Editor component for soli/post-nav.
 *
 * The adjacent posts are only known on the front end, so the editor shows a
 * representative preview of the two cards. Labels are configurable.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { prevLabel, nextLabel } = attributes;
	const blockProps = useBlockProps( { className: 'soli-post-nav' } );

	return (
		<nav { ...blockProps }>
			<InspectorControls>
				<PanelBody title={ __( 'Labels', 'soli-gutenberg-theme' ) }>
					<TextControl
						label={ __( 'Vorige (ouder)', 'soli-gutenberg-theme' ) }
						value={ prevLabel }
						onChange={ ( value ) => setAttributes( { prevLabel: value } ) }
					/>
					<TextControl
						label={ __( 'Volgende (nieuwer)', 'soli-gutenberg-theme' ) }
						value={ nextLabel }
						onChange={ ( value ) => setAttributes( { nextLabel: value } ) }
					/>
				</PanelBody>
			</InspectorControls>
			<span className="soli-post-nav__card soli-post-nav__card--prev">
				<span className="soli-post-nav__label">&larr; { prevLabel }</span>
				<span className="soli-post-nav__title">
					{ __( 'Titel van het oudere bericht', 'soli-gutenberg-theme' ) }
				</span>
				<span className="soli-post-nav__date">1 januari 2026</span>
			</span>
			<span className="soli-post-nav__card soli-post-nav__card--next">
				<span className="soli-post-nav__label">{ nextLabel } &rarr;</span>
				<span className="soli-post-nav__title">
					{ __( 'Titel van het nieuwere bericht', 'soli-gutenberg-theme' ) }
				</span>
				<span className="soli-post-nav__date">31 januari 2026</span>
			</span>
		</nav>
	);
}
