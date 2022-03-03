<?php

namespace ANiceBlockCode;

use ANiceBlockCode\Languages;
use ANiceBlockCode\Plugin;

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
		if( has_block('a-nice-code-block/code-block') ) {

			# CodeMirror Stylesheet
			wp_enqueue_style(
				Plugin::SLUG . '-code-mirror',
				Plugin::URL() . 'vendor/codemirror/codemirror.css',
				[],
				Plugin::VERSION
			);

			# CodeMirror Theme
			//$theme = get_selected_theme(); // TODO
			$theme = 'hopscotch';

			wp_enqueue_style(
				Plugin::SLUG . '-code-mirror-theme',
				Plugin::URL() . "vendor/codemirror/themes/$theme.css",
				[ Plugin::SLUG . '-code-mirror' ],
				Plugin::VERSION
			);

			# CodeMirror Scripts and Add-ons
			wp_enqueue_script(
				Plugin::SLUG . '-code-mirror',
				Plugin::URL() . 'vendor/codemirror/codemirror.js',
				[],
        Plugin::VERSION
			);

			wp_enqueue_script(
				Plugin::SLUG . '-code-mirror-matchbrackets',
				Plugin::URL() . 'vendor/codemirror/addons/edit/matchbrackets.js',
				[ Plugin::SLUG . '-code-mirror' ],
        Plugin::VERSION
			);

			# CodeMirror Languages
			## First: get content and fetch used languages
			$content = get_post();
			$regex = "#<!-- wp:advanced-gutenberg-blocks/code {([^\>]+?)?\"language\":\"(.*?)\"#";
			preg_match_all( $regex, $content->post_content, $matches );
			$langs = $matches[2];

			## Second: convert languages to modes
			$languages = Languages::getLanguagesList();
			$modes = [];

			foreach( $langs as $lang ) {
				$key = array_search( $lang, array_column( $languages, 'slug' ) );
				$modes[] = $languages[$key]['mode'];
			}

			$modes = array_unique( $modes );

			## Some languages needs some addons first
			if( count( array_intersect( ['rust'] , $modes ) ) > 0 ) {
				wp_enqueue_script(
					Plugin::SLUG . '-code-mirror-simplemode',
					Plugin::URL() . 'vendor/codemirror/addons/mode/simple.js',
					[ Plugin::SLUG . '-code-mirror' ],
					Plugin::VERSION
				);
			}

			## Then: load dependencies according to languages used
			foreach( $modes as $mode ) {
				wp_enqueue_script(
					Plugin::SLUG . "-code-mirror-$mode ",
					Plugin::URL() . "vendor/codemirror/modes/$mode/$mode.js",
					[ Plugin::SLUG . "-code-mirror" ],
					Plugin::VERSION
				);
			}

			## Finally: load additionnal dependencies needed for some languages
			### C-Like
			if ( count ( array_intersect( ['php'] , $modes) ) > 0 ) {
				wp_enqueue_script(
					Plugin::SLUG . '-code-mirror-clike',
					Plugin::URL() . 'vendor/codemirror/modes/clike/clike.js',
					[ Plugin::SLUG . '-code-mirror' ],
					Plugin::VERSION
				);
			}

			### Front End mixed
			if( count( array_intersect( ['php', 'xml', 'twig', 'javascript', 'jsx'] , $modes ) ) > 0 ) {
				wp_enqueue_script(
					Plugin::SLUG . '-code-mirror-htmlmixed',
					Plugin::URL() . 'vendor/codemirror/modes/htmlmixed/htmlmixed.js',
					[ Plugin::SLUG . '-code-mirror' ],
					Plugin::VERSION
				);

				wp_enqueue_script(
					Plugin::SLUG . '-code-mirror-xml',
					Plugin::URL() . 'vendor/codemirror/modes/xml/xml.js',
					[ Plugin::SLUG . '-code-mirror' ],
					Plugin::VERSION
				);

				wp_enqueue_script(
					Plugin::SLUG . '-code-mirror-css',
					Plugin::URL() . 'vendor/codemirror/modes/css/css.js',
					[ Plugin::SLUG . '-code-mirror' ],
					Plugin::VERSION
				);

				wp_enqueue_script(
					Plugin::SLUG . '-code-mirror-javascript',
					Plugin::URL() . 'vendor/codemirror/modes/javascript/javascript.js',
					[ Plugin::SLUG . '-code-mirror' ],
					Plugin::VERSION
				);
			}
		}
	}
}
