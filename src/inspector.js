import { __ } from '@wordpress/i18n'
import { InspectorControls } from '@wordpress/block-editor'
import { PanelBody } from '@wordpress/components'

export default function Inspector( { file, showLines, startLine, wrapLines, highlightStart, highlightEnd, setAttributes, entry } ) {

	return (
		<InspectorControls>

      <PanelBody title={ __( 'Settings', 'code-block' ) }></PanelBody>

		</InspectorControls>
	);
}
