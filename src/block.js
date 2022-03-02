import { __ } from '@wordpress/i18n'
import { useBlockProps } from '@wordpress/block-editor'

export default function Block( {  attributes, setAttributes, entry } ) {

	return (
		<p {...useBlockProps()}>
			{__('Code Block – hello from the editor!', 'code-block')}
		</p>
	);
}
