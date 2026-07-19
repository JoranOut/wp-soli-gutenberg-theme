import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import { Button } from '@wordpress/components';

/**
 * Editor component for soli/concert-details.
 *
 * Renders an editable facts table. Each row has an inline-editable label and
 * value (value allows line breaks). Rows can be added and removed.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { rows } = attributes;

	const updateRow = ( index, key, value ) => {
		const next = rows.map( ( row, i ) =>
			i === index ? { ...row, [ key ]: value } : row
		);
		setAttributes( { rows: next } );
	};

	const removeRow = ( index ) => {
		setAttributes( { rows: rows.filter( ( _, i ) => i !== index ) } );
	};

	const addRow = () => {
		setAttributes( { rows: [ ...rows, { label: '', value: '' } ] } );
	};

	const blockProps = useBlockProps( { className: 'soli-concert-details' } );

	return (
		<div { ...blockProps }>
			<table className="soli-concert-details-table">
				<tbody>
					{ rows.map( ( row, index ) => (
						<tr key={ index }>
							<th scope="row">
								<RichText
									tagName="span"
									allowedFormats={ [] }
									value={ row.label }
									onChange={ ( value ) => updateRow( index, 'label', value ) }
									placeholder={ __( 'Label', 'soli-gutenberg-theme' ) }
								/>
							</th>
							<td>
								<RichText
									tagName="span"
									value={ row.value }
									onChange={ ( value ) => updateRow( index, 'value', value ) }
									placeholder={ __( 'Waarde', 'soli-gutenberg-theme' ) }
								/>
								<Button
									className="soli-concert-details__remove"
									icon="no-alt"
									label={ __( 'Rij verwijderen', 'soli-gutenberg-theme' ) }
									onClick={ () => removeRow( index ) }
								/>
							</td>
						</tr>
					) ) }
				</tbody>
			</table>
			<Button variant="secondary" onClick={ addRow }>
				{ __( 'Rij toevoegen', 'soli-gutenberg-theme' ) }
			</Button>
		</div>
	);
}
