import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';

export default function Save() {
	return (
		<p {...useBlockProps.save()}>
			{__('Code Block – hello from the saved content!', 'code-block')}
		</p>
	);
}
