import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';

/**
 * Default inner content: a Query Loop rendering posts as featured image +
 * title + excerpt. The masonry layout is applied to these on the front end.
 */
const TEMPLATE = [
	[
		'core/query',
		{
			queryId: 0,
			query: {
				perPage: 9,
				pages: 0,
				offset: 0,
				postType: 'post',
				order: 'desc',
				orderBy: 'date',
				inherit: false,
			},
		},
		[
			[
				'core/post-template',
				{},
				[
					[ 'core/post-featured-image', { isLink: true } ],
					[ 'core/post-title', { isLink: true, level: 3 } ],
					[ 'core/post-excerpt' ],
				],
			],
		],
	],
];

/**
 * Editor component for soli/masonry.
 *
 * The editor shows the inner Query Loop in its normal flow; a CSS multi-column
 * preview (via the --soli-masonry-columns custom properties and the shared
 * style.scss fallback) hints at the masonry result. The real shortest-column
 * packing runs on the front end in view.js.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { columns, columnsTablet, columnsMobile, gap } = attributes;

	const blockProps = useBlockProps( {
		className: 'soli-masonry is-editor',
		style: {
			'--soli-masonry-gap': `${ gap }px`,
			'--soli-masonry-columns': columns,
			'--soli-masonry-columns-tablet': columnsTablet,
			'--soli-masonry-columns-mobile': columnsMobile,
		},
	} );

	const innerBlocksProps = useInnerBlocksProps( blockProps, {
		template: TEMPLATE,
	} );

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Masonry', 'soli-gutenberg-theme' ) }>
					<RangeControl
						label={ __( 'Kolommen (desktop)', 'soli-gutenberg-theme' ) }
						value={ columns }
						onChange={ ( value ) =>
							setAttributes( { columns: value || 1 } )
						}
						min={ 1 }
						max={ 6 }
					/>
					<RangeControl
						label={ __( 'Kolommen (tablet)', 'soli-gutenberg-theme' ) }
						value={ columnsTablet }
						onChange={ ( value ) =>
							setAttributes( { columnsTablet: value || 1 } )
						}
						min={ 1 }
						max={ 5 }
					/>
					<RangeControl
						label={ __( 'Kolommen (mobiel)', 'soli-gutenberg-theme' ) }
						value={ columnsMobile }
						onChange={ ( value ) =>
							setAttributes( { columnsMobile: value || 1 } )
						}
						min={ 1 }
						max={ 3 }
					/>
					<RangeControl
						label={ __( 'Tussenruimte (px)', 'soli-gutenberg-theme' ) }
						value={ gap }
						onChange={ ( value ) =>
							setAttributes( { gap: value ?? 24 } )
						}
						min={ 0 }
						max={ 64 }
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...innerBlocksProps } />
		</>
	);
}
