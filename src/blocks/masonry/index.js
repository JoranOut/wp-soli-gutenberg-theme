import { registerBlockType } from '@wordpress/blocks';
import { InnerBlocks } from '@wordpress/block-editor';
import metadata from './block.json';
import Edit from './edit';
import './style.scss';

registerBlockType( metadata.name, {
	edit: Edit,
	// Dynamic block: render.php wraps the serialized inner blocks; the masonry
	// layout itself is built on the front end by view.js.
	save: () => <InnerBlocks.Content />,
} );
