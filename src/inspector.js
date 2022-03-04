import { __ } from '@wordpress/i18n'
import { InspectorControls } from '@wordpress/block-editor'
import { PanelBody, TextControl, ToggleControl, SelectControl } from '@wordpress/components'

export default function Inspector( props ) {

	const { attributes, setAttributes } = props
	const { language, theme, file, showLines, startLine, wrapLines } = attributes

	return (
		<InspectorControls>

      <PanelBody title={ __('Settings', 'prettycode') }>

				<SelectControl
					value={ language }
					label={ __('Language', 'prettycode') }
					options={ prettyCode.languages }
					onChange={ ( language ) => setAttributes( { language } )  }
				/>

				<SelectControl
					value={ theme }
					label={ __('Theme', 'prettycode') }
					options={ prettyCode.themes }
					onChange={ ( theme ) => setAttributes( { theme } )  }
				/>

				<TextControl
					type="text"
					label={ __('File name', 'prettycode') }
					onChange={ file => setAttributes( { file } ) }
					placeHolder={ __('/my/optionnal/file/name.ext', 'prettycode') }
					value={ file }
				/>

				<ToggleControl
					label={ __('Auto wrap long lines', 'prettycode') }
					checked={ wrapLines }
					onChange={ () => setAttributes( { wrapLines: ! wrapLines } ) }
				/>

				<ToggleControl
					label={ __('Show lines numbers', 'prettycode') }
					checked={ showLines }
					onChange={ () => setAttributes( { showLines: ! showLines } ) }
				/>

				{ showLines && (
					<TextControl
						type="number"
						label={ __('Start line', 'prettycode') }
						onChange={ startLine => setAttributes( { startLine: parseInt(startLine) } ) }
						value={ startLine }
						className='prettycode-small-input'
						min="1"
					/>
				) }

			</PanelBody>

		</InspectorControls>
	);
}
