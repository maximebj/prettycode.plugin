import { __ } from '@wordpress/i18n'
import { Fragment } from '@wordpress/element'

import Toolbar from './toolbar'
import Inspector from './inspector'
import Block from './block'

import './editor.scss'

export default function Edit( { attributes, setAttributes } ) {

	const { alignment, file, showLines, startLine, wrapLines, highlightStart, highlightEnd } = attributes

	const entry = ''

	return (
		<Fragment>
			<Toolbar { ...{ alignment, setAttributes } } />
			<Inspector { ...{ file, showLines, startLine, wrapLines, highlightStart, highlightEnd, setAttributes, entry } } />
			<Block { ...{ attributes, setAttributes, entry } } />
		</Fragment>
	);
}
