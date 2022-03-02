import { __ } from '@wordpress/i18n'
import { useBlockProps } from '@wordpress/block-editor'

export default function Block( props ) {

	const { attributes, setAttributes } = props

	return (
		<p {...useBlockProps()}>
			{__('Code Block – hello from the editor!', 'a-nice-code-block')}
		</p>
	);
}
