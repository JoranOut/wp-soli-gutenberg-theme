import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';
import metadata from './block.json';
import Edit from './edit';
import './style.scss';

registerBlockType( metadata.name, {
	edit: Edit,
	// Dynamic block: rendered by render.php; inner blocks are serialized.
	save: () => <InnerBlocks.Content />,
} );
