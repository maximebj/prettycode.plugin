import { registerBlockType } from '@wordpress/blocks'

import './style.scss'

import Edit from './edit'
import Save from './save'

registerBlockType('a-nice-code-block/code-block', {
	attributes: {
		language: {
			type: 'string',
			default: aNiceCodeBlock.languages[0].value,
		},
		theme: {
			type: 'string',
			default: aNiceCodeBlock.themes[0].value,
		},
		file: {
			type: 'string',
			default: '',
		},
		source: {
			type: 'string',
			default: '',
		},
		showLines: {
			type: 'boolean',
			default: true,
		},
		startLine: {
			type: 'integer',
			default: 1,
		},
		wrapLines: {
			type: 'boolean',
			default: true,
		},
		highlightStart: {
			type: 'string',
			default: '',
		},
		highlightEnd: {
			type: 'string',
			default: '',
		}
	},
	edit: Edit,
	save: Save,
})
