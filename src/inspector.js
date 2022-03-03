import { __ } from '@wordpress/i18n'
import { InspectorControls } from '@wordpress/block-editor'
import { PanelBody, TextControl, ToggleControl, SelectControl } from '@wordpress/components'

export default function Inspector( props ) {

	const { attributes, setAttributes } = props
	const { language, theme, file, showLines, startLine, wrapLines } = attributes

	return (
		<InspectorControls>

      <PanelBody title={ __('Settings', 'a-nice-code-block') }>

				<SelectControl
					value={ language }
					label={ __('Language', 'a-nice-code-block') }
					options={ aNiceCodeBlock.languages }
					onChange={ ( language ) => setAttributes( { language } )  }
				/>

				<SelectControl
					value={ theme }
					label={ __('Theme', 'a-nice-code-block') }
					options={ aNiceCodeBlock.themes }
					onChange={ ( theme ) => setAttributes( { theme } )  }
				/>

				<TextControl
					type="text"
					label={ __('File name', 'a-nice-code-block') }
					onChange={ file => setAttributes( { file } ) }
					placeHolder={ __('/my/optionnal/file/name.ext', 'a-nice-code-block') }
					value={ file }
				/>

				<ToggleControl
					label={ __('Auto wrap long lines', 'a-nice-code-block') }
					checked={ wrapLines }
					onChange={ () => setAttributes( { wrapLines: ! wrapLines } ) }
				/>

				<ToggleControl
					label={ __('Show lines numbers', 'a-nice-code-block') }
					checked={ showLines }
					onChange={ () => setAttributes( { showLines: ! showLines } ) }
				/>

				{ showLines && (
					<TextControl
						type="number"
						label={ __('Start line', 'a-nice-code-block') }
						onChange={ startLine => setAttributes( { startLine: parseInt(startLine) } ) }
						value={ startLine }
						className='ancb-small-input'
						min="1"
					/>
				) }

			</PanelBody>

		</InspectorControls>
	);
}
