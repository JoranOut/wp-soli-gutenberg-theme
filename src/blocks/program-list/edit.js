import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';

/**
 * Editor component for soli/program-list.
 *
 * Renders the works as an editable grid. Enter in an item adds a new item;
 * each item has a remove button.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { items } = attributes;

	const updateItem = ( index, value ) => {
		setAttributes( {
			items: items.map( ( item, i ) => ( i === index ? value : item ) ),
		} );
	};

	const addItem = () => {
		setAttributes( { items: [ ...items, '' ] } );
	};

	const removeItem = ( index ) => {
		setAttributes( { items: items.filter( ( _, i ) => i !== index ) } );
	};

	const blockProps = useBlockProps( { className: 'soli-program-list-edit' } );

	return (
		<div { ...blockProps }>
			<ul className="soli-program-list">
				{ items.map( ( item, index ) => (
					<li className="soli-program-list__item" key={ index }>
						<span className="soli-program-list__dot" aria-hidden="true"></span>
						<RichText
							tagName="span"
							className="soli-program-list__text"
							allowedFormats={ [] }
							value={ item }
							onChange={ ( value ) => updateItem( index, value ) }
							placeholder={ __( 'Titel — componist', 'soli-gutenberg-theme' ) }
						/>
						<Button
							className="soli-program-list__remove"
							icon="no-alt"
							label={ __( 'Verwijderen', 'soli-gutenberg-theme' ) }
							onClick={ () => removeItem( index ) }
						/>
					</li>
				) ) }
			</ul>
			<Button variant="secondary" onClick={ addItem }>
				{ __( 'Werk toevoegen', 'soli-gutenberg-theme' ) }
			</Button>
		</div>
	);
}
