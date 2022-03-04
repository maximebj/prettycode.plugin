<?php

namespace PrettyCode;

use PrettyCode\Plugin;

defined( 'ABSPATH' ) || exit;

class Front
{
	/**
   * Registrer Hooks
	 *
	 * @return void
	 */
	public function registerHooks(): void
	{
		add_action( 'wp_enqueue_scripts', [ $this, 'loadFrontAssets' ] );
	}


	/**
   * Load Front Assets
	 *
	 * Assets are loaded only when required (a code block exists on post)
	 * Only necessary CodeMirror languages and modes are loaded
	 *
	 * @return void
	 */
	public function loadFrontAssets(): void
	{
		# No need to load assets if blocks are not used in the post
		if( ! has_block( 'prettycode/code' ) ) {
			return;
		}

		# Themes and languages to load
		$themes = [];
		$languages = [];

		# Get Post content
		$post = get_post();

		# Parse blocks
		$blocks = parse_blocks( $post->post_content );

		# Get themes and languages to load
    foreach( $blocks as $block ) {
			if( $block['blockName'] !== 'prettycode/code' ) { continue; }

			$themes[] = $block['attrs']['theme'] ?? 'hopscotch';
			$languages[] = $block['attrs']['language'] ?? 'xml';
    }

		# Ensure unique values
		$themes = array_unique( $themes );
		$languages = array_unique( $languages );

		# CodeMirror Stylesheet
		wp_enqueue_style(
			Plugin::SLUG . '-code-mirror',
			Plugin::URL() . 'codemirror/codemirror.css',
			[],
			Plugin::VERSION
		);

		# CodeMirror Themes
		foreach( $themes as $theme ) {
			wp_enqueue_style(
				Plugin::SLUG . "-code-mirror-theme-$theme",
				Plugin::URL() . "codemirror/themes/$theme.css",
				[ Plugin::SLUG . '-code-mirror' ],
				Plugin::VERSION
			);
		}

		# CodeMirror Scripts and Add-ons
		wp_enqueue_script(
			Plugin::SLUG . '-code-mirror',
			Plugin::URL() . 'codemirror/codemirror.js',
			[],
			Plugin::VERSION
		);

		wp_enqueue_script(
			Plugin::SLUG . '-code-mirror-matchbrackets',
			Plugin::URL() . 'codemirror/addons/edit/matchbrackets.js',
			[ Plugin::SLUG . '-code-mirror' ],
			Plugin::VERSION
		);

		# CodeMirror Languages
		## Some languages needs some addons first
		if( count( array_intersect( ['rust'] , $languages ) ) > 0 ) {
			wp_enqueue_script(
				Plugin::SLUG . '-code-mirror-simplemode',
				Plugin::URL() . 'codemirror/addons/mode/simple.js',
				[ Plugin::SLUG . '-code-mirror' ],
				Plugin::VERSION
			);
		}

		## Then: load dependencies according to languages used
		foreach( $languages as $language ) {
			wp_enqueue_script(
				Plugin::SLUG . "-code-mirror-mode-$language",
				Plugin::URL() . "codemirror/modes/$language/$language.js",
				[ Plugin::SLUG . "-code-mirror" ],
				Plugin::VERSION
			);
		}

		## Finally: load additionnal dependencies needed for some languages
		### C-Like
		if ( count( array_intersect( ['php'] , $languages ) ) > 0 ) {
			wp_enqueue_script(
				Plugin::SLUG . '-code-mirror-clike',
				Plugin::URL() . 'codemirror/modes/clike/clike.js',
				[ Plugin::SLUG . '-code-mirror' ],
				Plugin::VERSION
			);
		}

		### Front End mixed
		if( count( array_intersect( ['php', 'xml', 'twig', 'javascript', 'jsx'] , $languages ) ) > 0 ) {
			wp_enqueue_script(
				Plugin::SLUG . '-code-mirror-htmlmixed',
				Plugin::URL() . 'codemirror/modes/htmlmixed/htmlmixed.js',
				[ Plugin::SLUG . '-code-mirror' ],
				Plugin::VERSION
			);

			wp_enqueue_script(
				Plugin::SLUG . '-code-mirror-css',
				Plugin::URL() . 'codemirror/modes/css/css.js',
				[ Plugin::SLUG . '-code-mirror' ],
				Plugin::VERSION
			);

			wp_enqueue_script(
				Plugin::SLUG . '-code-mirror-javascript',
				Plugin::URL() . 'codemirror/modes/javascript/javascript.js',
				[ Plugin::SLUG . '-code-mirror' ],
				Plugin::VERSION
			);
		}
	}
}
