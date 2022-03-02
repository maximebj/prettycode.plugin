import { __ } from '@wordpress/i18n'
import { Fragment } from '@wordpress/element'

import Inspector from './inspector'
import Block from './block'

import './editor.scss'

export default function Edit( props ) {

	const { attributes, setAttributes } = props
	const { language, file, showLines, startLine, wrapLines, highlightStart, highlightEnd } = attributes

	// Get current language object
	const getLanguages = () => {
		let entry = _.find( aNiceCodeBlock.languages, { slug: language } )
		if( _.isUndefined( entry ) ) {
			return aNiceCodeBlock.languages[0]
		}
		return entry
	}

	const languageObject = getLanguages()

	return (
		<Fragment>
			<Inspector { ...{ file, showLines, startLine, wrapLines, highlightStart, highlightEnd, setAttributes, languageObject } } />
			<Block { ...{ attributes, setAttributes, languageObject } } />
		</Fragment>
	);
}
