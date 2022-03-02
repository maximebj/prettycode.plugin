import { __ } from '@wordpress/i18n'
import { BlockControls, BlockAlignmentToolbar } from '@wordpress/block-editor'

export default function Toolbar( { alignment, setAttributes } ) {

	return (
		<BlockControls>
			<BlockAlignmentToolbar
				value={ alignment }
				onChange={ alignment => setAttributes( { alignment } ) }
			/>
		</BlockControls>
	);
}
