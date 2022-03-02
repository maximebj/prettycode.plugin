import { __ } from '@wordpress/i18n'
import { useBlockProps } from '@wordpress/block-editor'

export default function Block( props ) {

	const { attributes, setAttributes } = props
	const { language, theme, file, showLines, startLine, wrapLines, highlightStart, highlightEnd } = attributes

	// Get current language object from value
	const getLanguageObject = () => {
		let entry = _.find( aNiceCodeBlock.languages, { value: language } )
		if( _.isUndefined( entry ) ) {
			return aNiceCodeBlock.languages[0]
		}
		return entry
	}
	const languageObject = getLanguageObject()

	return (
		<div {...useBlockProps()}>
			<link rel='stylesheet' href={ `../wp-content/plugins/a-nice-code-block/codemirror/themes/${theme}.css` } type='text/css' />
			<header className="ancb-header">
				<div className={ `ancb-lang is-lang-${language}` }>
					{ languageObject.label }
				</div>
				<div className="ancb-file">
					{file}
				</div>
			</header>

			{/* <CodeMirror
				value={source}
				onChange={ source => setAttributes( { source } ) }
				options={
					lineNumbers: showLines,
					theme: theme,
					firstLineNumber: startLine,
					mode: languageObject.mode,
					indentUnit: 4,
					tabSize: 4,
					matchBrackets: true,
					lineWrapping: wrapLines,
				}
			/> */}
		</div>
	);
}
