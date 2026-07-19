import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	InspectorControls,
} from '@wordpress/block-editor';
import {
	PanelBody,
	ComboboxControl,
	TextControl,
	ToggleControl,
	Placeholder,
} from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { store as coreStore } from '@wordpress/core-data';
import { decodeEntities } from '@wordpress/html-entities';

/**
 * Editor component for soli/group-card.
 *
 * Renders a client-side preview of either the overview card face or,
 * inside a soli/group-slider (context soli/displayMode = tile), the tile face.
 */
export default function Edit( { attributes, setAttributes, context } ) {
	const { pageId, rehearsal, showArrow } = attributes;
	const isTile = context[ 'soli/displayMode' ] === 'tile';

	const pages = useSelect(
		( select ) =>
			select( coreStore ).getEntityRecords( 'postType', 'page', {
				per_page: -1,
				status: 'publish',
				_fields: 'id,title',
				orderby: 'title',
				order: 'asc',
			} ),
		[]
	);

	const page = useSelect(
		( select ) =>
			pageId
				? select( coreStore ).getEntityRecord( 'postType', 'page', pageId )
				: null,
		[ pageId ]
	);

	const imageUrl = useSelect(
		( select ) => {
			if ( ! page?.featured_media ) {
				return null;
			}
			const media = select( coreStore ).getMedia( page.featured_media );
			return (
				media?.media_details?.sizes?.large?.source_url ||
				media?.source_url ||
				null
			);
		},
		[ page?.featured_media ]
	);

	const options = ( pages || [] ).map( ( p ) => ( {
		value: p.id,
		label: decodeEntities( p.title.rendered ) || `#${ p.id }`,
	} ) );

	const name = page ? decodeEntities( page.title.rendered ) : '';
	const tagline = page ? decodeEntities( page.excerpt?.rendered || '' ).replace( /<[^>]+>/g, '' ).trim() : '';
	const imageStyle = imageUrl
		? { backgroundImage: `url('${ imageUrl }')` }
		: undefined;

	const hasPage = !! ( pageId && page );
	const blockProps = useBlockProps( {
		className: hasPage ? ( isTile ? 'soli-tile' : 'soli-og-card' ) : undefined,
	} );

	const inspector = (
		<InspectorControls>
			<PanelBody title={ __( 'Groep', 'soli-gutenberg-theme' ) }>
				<ComboboxControl
					label={ __( 'Pagina', 'soli-gutenberg-theme' ) }
					help={ __(
						'De pagina van het orkest of de groep. Foto (uitgelichte afbeelding), naam en tagline (samenvatting) komen van deze pagina.',
						'soli-gutenberg-theme'
					) }
					value={ pageId || null }
					options={ options }
					onChange={ ( value ) =>
						setAttributes( { pageId: value ? parseInt( value, 10 ) : 0 } )
					}
				/>
				<TextControl
					label={ __( 'Repetitiemoment', 'soli-gutenberg-theme' ) }
					help={ __( 'Bijvoorbeeld: “ma · 20:00 – 22:00”.', 'soli-gutenberg-theme' ) }
					value={ rehearsal }
					onChange={ ( value ) => setAttributes( { rehearsal: value } ) }
				/>
				{ ! isTile && (
					<ToggleControl
						label={ __( 'Pijl tonen bij hover', 'soli-gutenberg-theme' ) }
						checked={ showArrow }
						onChange={ ( value ) => setAttributes( { showArrow: value } ) }
					/>
				) }
			</PanelBody>
		</InspectorControls>
	);

	if ( ! hasPage ) {
		return (
			<div { ...blockProps }>
				{ inspector }
				<Placeholder
					icon="id-alt"
					label={ __( 'Groepskaart', 'soli-gutenberg-theme' ) }
					instructions={ __(
						'Kies in de zijbalk de pagina van het orkest of de groep.',
						'soli-gutenberg-theme'
					) }
				>
					<ComboboxControl
						__nextHasNoMarginBottom
						value={ pageId || null }
						options={ options }
						onChange={ ( value ) =>
							setAttributes( { pageId: value ? parseInt( value, 10 ) : 0 } )
						}
					/>
				</Placeholder>
			</div>
		);
	}

	if ( isTile ) {
		return (
			<div { ...blockProps }>
				{ inspector }
				<span className="soli-tile-inner">
					<span className="soli-tile-img" style={ imageStyle }></span>
					<span className="soli-tile-cap">
						<span className="soli-tile-name">{ name }</span>
						{ rehearsal && (
							<span className="soli-tile-meet">🗓️ { rehearsal }</span>
						) }
					</span>
				</span>
			</div>
		);
	}

	return (
		<div { ...blockProps }>
			{ inspector }
			<span className="soli-og-card-img" style={ imageStyle } role="img" aria-label={ name }></span>
			<span className="soli-og-card-body">
				{ rehearsal && (
					<span className="soli-og-card-meta">🗓️ { rehearsal }</span>
				) }
				<span className="soli-og-card-name">{ name }</span>
				{ tagline && <span className="soli-og-card-tag">{ tagline }</span> }
				{ showArrow && (
					<span className="soli-og-card-arrow" aria-hidden="true">
						→
					</span>
				) }
			</span>
		</div>
	);
}
