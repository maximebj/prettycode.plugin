import { __ } from '@wordpress/i18n'
import { useBlockProps } from '@wordpress/block-editor'
import { UnControlled as CodeMirror } from 'react-codemirror2'

// Require langs for CodeMirror
aNiceCodeBlock.languages.map( lang => {
  if ( lang.mode != '' ) {
    require(`codemirror/mode/${lang.mode}/${lang.mode}`)
  }
})
require(`codemirror/addon/edit/matchbrackets`)

export default function Block( props ) {

	const { attributes, setAttributes } = props
	const { language, theme, file, source, showLines, startLine, wrapLines } = attributes

	const languageObject = _.find( aNiceCodeBlock.languages, { value: language } )

	return (
		<div {...useBlockProps()}>
			<link rel='stylesheet' href={ `../wp-content/plugins/a-nice-code-block/codemirror/themes/${theme}.css` } type='text/css' />
			<header className="ancb-header">
				<div className={ `ancb-lang is-lang-${languageObject.value}` }>
					{ languageObject.label }
				</div>
				<div className="ancb-file">
					{file}
				</div>
			</header>

			<CodeMirror
				value={source}
				onChange={(editor, data, source) => setAttributes( { source } ) }
				options={{
					lineNumbers: showLines,
					theme: theme,
					firstLineNumber: startLine,
					mode: languageObject.mode,
					indentUnit: 4,
					tabSize: 4,
					matchBrackets: true,
					lineWrapping: wrapLines,
				}}
			/>
		</div>
	);
}
