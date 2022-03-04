import { registerBlockType } from '@wordpress/blocks'

import './style.scss'

import Edit from './edit'
import Save from './save'

registerBlockType('prettycode/code', {
	attributes: {
		language: {
			type: 'string',
			default: prettyCode.languages[0].value,
		},
		theme: {
			type: 'string',
			default: prettyCode.themes[0].value,
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
		}
	},
	edit: Edit,
	save: Save,
})
