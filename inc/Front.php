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
		if( ! has_block( 'a-nice-code-block/code-block' ) ) {
			return;
		}

		# Get Post content
		$content = get_post();

		# CodeMirror Stylesheet
		wp_enqueue_style(
			Plugin::SLUG . '-code-mirror',
			Plugin::URL() . 'codemirror/codemirror.css',
			[],
			Plugin::VERSION
		);

		# CodeMirror Themes
		$regex = "#<!-- wp:a-nice-code-block/code-block {([^\>]+?)?\"theme\":\"(.*?)\"#";
		preg_match_all( $regex, $content->post_content, $matches );
		$themes = $matches[2];
		$themes[] = 'hopscotch'; # Add default theme to not miss it (not in attributes if selected because default value)

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
		## First: get content and fetch used languages
		$regex = "#<!-- wp:a-nice-code-block/code-block {([^\>]+?)?\"language\":\"(.*?)\"#";
		preg_match_all( $regex, $content->post_content, $matches );
		$langs = $matches[2];

		## Second: convert languages to modes
		$languages = Languages::getLanguagesList();
		$modes = [ 'xml' ]; # XML is often required

		foreach( $langs as $lang ) {
			$key = array_search( $lang, array_column( $languages, 'value' ) );
			$modes[] = $languages[$key]['mode'];
		}
		$modes = array_unique( $modes );

		## Some languages needs some addons first
		if( count( array_intersect( ['rust'] , $modes ) ) > 0 ) {
			wp_enqueue_script(
				Plugin::SLUG . '-code-mirror-simplemode',
				Plugin::URL() . 'codemirror/addons/mode/simple.js',
				[ Plugin::SLUG . '-code-mirror' ],
				Plugin::VERSION
			);
		}

		## Then: load dependencies according to languages used
		foreach( $modes as $mode ) {
			wp_enqueue_script(
				Plugin::SLUG . "-code-mirror-$mode",
				Plugin::URL() . "codemirror/modes/$mode/$mode.js",
				[ Plugin::SLUG . "-code-mirror" ],
				Plugin::VERSION
			);
		}

		## Finally: load additionnal dependencies needed for some languages
		### C-Like
		if ( count( array_intersect( ['php'] , $modes ) ) > 0 ) {
			wp_enqueue_script(
				Plugin::SLUG . '-code-mirror-clike',
				Plugin::URL() . 'codemirror/modes/clike/clike.js',
				[ Plugin::SLUG . '-code-mirror' ],
				Plugin::VERSION
			);
		}

		### Front End mixed
		if( count( array_intersect( ['php', 'xml', 'twig', 'javascript', 'jsx'] , $modes ) ) > 0 ) {
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
