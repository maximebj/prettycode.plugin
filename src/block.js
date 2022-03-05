import { __ } from '@wordpress/i18n'
import { useBlockProps } from '@wordpress/block-editor'
import { Controlled as CodeMirror } from 'react-codemirror2'

// Require langs for CodeMirror
prettyCode.languages.map( lang => {
  if ( lang.mode != '' ) {
    require(`codemirror/mode/${lang.mode}/${lang.mode}`)
  }
})
require(`codemirror/addon/edit/matchbrackets`)

export default function Block( props ) {

	const { attributes, setAttributes } = props
	const { language, theme, file, source, showLines, startLine, wrapLines } = attributes

	const languageObject = _.find( prettyCode.languages, { value: language } )

	return (
		<div {...useBlockProps()}>
			<link rel='stylesheet' href={ `${prettyCode.url}vendor/codemirror/themes/${theme}.css` } type='text/css' />
			<header className="prettycode-header">
				<div className={ `prettycode-lang is-lang-${languageObject.value}` }>
					{languageObject.label}
				</div>
				<div className="prettycode-file">
					{file}
				</div>
			</header>

			<CodeMirror
				value={source}
				onBeforeChange={(editor, data, source) => setAttributes( { source } )}
				options={{
					lineNumbers: showLines,
					theme: theme,
					firstLineNumber: startLine,
					mode: languageObject.mode,
					indentUnit: 4,
					tabSize: 4,
					matchBrackets: true,
					lineWrapping: wrapLines,
					scrollbarStyle: null,
				}}
			/>
		</div>
	)
}
