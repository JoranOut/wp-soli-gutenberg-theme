import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, RangeControl, ToggleControl } from '@wordpress/components';

const TEMPLATE = [
	[ 'soli/group-card' ],
	[ 'soli/group-card' ],
	[ 'soli/group-card' ],
];

/**
 * Editor component for soli/group-slider.
 *
 * Shows the tiles in a static row (no autoplay/shutter in the editor);
 * the interactive behavior runs on the front end via view.js.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { autoplay } = attributes;

	const blockProps = useBlockProps( {
		className: 'soli-slider is-static',
	} );

	const innerBlocksProps = useInnerBlocksProps(
		{ className: 'soli-slider-track' },
		{
			allowedBlocks: [ 'soli/group-card' ],
			template: TEMPLATE,
			orientation: 'horizontal',
		}
	);

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Slider', 'soli-gutenberg-theme' ) }>
					<ToggleControl
						label={ __( 'Automatisch afspelen', 'soli-gutenberg-theme' ) }
						checked={ autoplay > 0 }
						onChange={ ( value ) =>
							setAttributes( { autoplay: value ? 5000 : 0 } )
						}
					/>
					{ autoplay > 0 && (
						<RangeControl
							label={ __( 'Interval (seconden)', 'soli-gutenberg-theme' ) }
							value={ autoplay / 1000 }
							onChange={ ( value ) =>
								setAttributes( { autoplay: ( value || 5 ) * 1000 } )
							}
							min={ 2 }
							max={ 15 }
						/>
					) }
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				<div className="soli-slider-viewport">
					<div { ...innerBlocksProps } />
				</div>
			</div>
		</>
	);
}
