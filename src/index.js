import { registerBlockType } from '@wordpress/blocks'

import './style.scss'

import Edit from './edit'
import Save from './save'

registerBlockType('create-block/code-block', {
	attributes: {
		language: {
			type: 'string',
			default: '',
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
		alignment: {
			type: 'string',
		},
		wrapLines: {
			type: 'boolean',
			default: true,
		},
		highlightStart: {
			type: 'string',
		},
		highlightEnd: {
			type: 'string',
		}
	},
	edit: Edit,
	save: Save,
})
