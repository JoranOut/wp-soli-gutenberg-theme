import { __ } from '@wordpress/i18n';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	TextControl,
	ToggleControl,
} from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { store as coreStore } from '@wordpress/core-data';

/**
 * Editor component for soli/post-search.
 *
 * Renders a non-functional preview of the search form; the real behaviour is a
 * plain GET form on the front end (see render.php) plus the query_loop_block_query_vars
 * filter in functions.php.
 */
export default function Edit( { attributes, setAttributes } ) {
	const {
		paramName,
		postType,
		label,
		showLabel,
		placeholder,
		buttonText,
		showReset,
	} = attributes;

	// Only viewable post types can be used in a Query Loop, so only offer those.
	const postTypeOptions = useSelect( ( select ) => {
		const types = select( coreStore ).getPostTypes( { per_page: -1 } );

		return [
			{ label: __( 'Alle (elke Query Loop op deze pagina)', 'soli-gutenberg-theme' ), value: '' },
			...( types ?? [] )
				.filter( ( type ) => type.viewable )
				.map( ( type ) => ( { label: type.name, value: type.slug } ) ),
		];
	}, [] );

	const blockProps = useBlockProps( { className: 'soli-post-search' } );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Zoekinstellingen', 'soli-gutenberg-theme' ) }>
					<SelectControl
						__nextHasNoMarginBottom
						label={ __( 'Filtert berichttype', 'soli-gutenberg-theme' ) }
						help={ __(
							'Beperkt het zoeken tot Query Loops met dit berichttype. Kies "Alle" als er maar één Query Loop op de pagina staat.',
							'soli-gutenberg-theme'
						) }
						value={ postType }
						options={ postTypeOptions }
						onChange={ ( value ) => setAttributes( { postType: value } ) }
					/>
					<TextControl
						__nextHasNoMarginBottom
						label={ __( 'URL-parameter', 'soli-gutenberg-theme' ) }
						help={ __(
							'Naam van de zoekparameter in de URL. Wijk hier alleen van af bij meerdere zoekvelden op één pagina (registreer de naam dan via het filter soli_post_search_params).',
							'soli-gutenberg-theme'
						) }
						value={ paramName }
						onChange={ ( value ) => setAttributes( { paramName: value } ) }
					/>
				</PanelBody>
				<PanelBody title={ __( 'Teksten', 'soli-gutenberg-theme' ) } initialOpen={ false }>
					<ToggleControl
						__nextHasNoMarginBottom
						label={ __( 'Label tonen', 'soli-gutenberg-theme' ) }
						checked={ showLabel }
						onChange={ ( value ) => setAttributes( { showLabel: value } ) }
					/>
					<TextControl
						__nextHasNoMarginBottom
						label={ __( 'Label', 'soli-gutenberg-theme' ) }
						value={ label }
						placeholder={ __( 'Zoeken', 'soli-gutenberg-theme' ) }
						onChange={ ( value ) => setAttributes( { label: value } ) }
					/>
					<TextControl
						__nextHasNoMarginBottom
						label={ __( 'Placeholder', 'soli-gutenberg-theme' ) }
						value={ placeholder }
						placeholder={ __( 'Zoeken…', 'soli-gutenberg-theme' ) }
						onChange={ ( value ) => setAttributes( { placeholder: value } ) }
					/>
					<TextControl
						__nextHasNoMarginBottom
						label={ __( 'Knoptekst', 'soli-gutenberg-theme' ) }
						value={ buttonText }
						placeholder={ __( 'Zoeken', 'soli-gutenberg-theme' ) }
						onChange={ ( value ) => setAttributes( { buttonText: value } ) }
					/>
					<ToggleControl
						__nextHasNoMarginBottom
						label={ __( 'Wis-link tonen bij actieve zoekopdracht', 'soli-gutenberg-theme' ) }
						checked={ showReset }
						onChange={ ( value ) => setAttributes( { showReset: value } ) }
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				{ showLabel && (
					<span className="soli-post-search__label">
						{ label || __( 'Zoeken', 'soli-gutenberg-theme' ) }
					</span>
				) }
				<div className="soli-post-search__field">
					<input
						className="soli-post-search__input"
						type="search"
						placeholder={ placeholder || __( 'Zoeken…', 'soli-gutenberg-theme' ) }
						readOnly
					/>
					<button className="soli-post-search__button" type="button">
						{ buttonText || __( 'Zoeken', 'soli-gutenberg-theme' ) }
					</button>
				</div>
			</div>
		</>
	);
}
