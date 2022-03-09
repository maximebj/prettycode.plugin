<?php

namespace PrettyCode;

use PrettyCode\Languages;
use PrettyCode\Plugin;

defined( 'ABSPATH' ) || exit;

class Block
{
	/**
   * Registrer Hooks
	 *
	 * @return void
	 */
	public function registerHooks(): void
	{
		add_action( 'init', [ $this, 'registerBlock' ] );
		add_action( 'init', [ $this, 'registerTranslations' ] );
	}


	/**
   * Registrer Block
	 *
	 * Source is in /src/ folder and built files in /build/ folder
	 * Run `npm start` to start compiling files
	 * Run `npm run build` to build files
	 *
	 * @return void
	 */
	public function registerBlock(): void
	{
		# Register Code Block
		register_block_type(
      Plugin::path() . 'build',
      [
				'render_callback' => [ $this, 'renderBlock' ]
			]
    );
	}


	/**
   * Registrer Translations
	 *
	 * @return void
	 */
	public function registerTranslations(): void
	{
		# Register Code Block
		wp_set_script_translations( 'prettycode-code-editor-script', Plugin::SLUG, Plugin::path() . 'languages' );
	}


	/**
   * Render Block in frontend
	 *
	 * @param array $attributes
	 *
	 * @return string The rendered block in HTML
	 */
	public function renderBlock( $attributes ): string
	{
		# Default values
		$source      = $attributes['source'] 		?? __( 'No code to display', Plugin::SLUG );
		$file 		   = $attributes['file'] 			?? '';
		$language    = $attributes['language']  ?? 'html';
		$theme    	 = $attributes['theme'] 	  ?? 'hopscotch';
		$startLine   = $attributes['startLine'] ?? 1;
		$showLines   = $attributes['showLines'] ?? true;
		$wrapLines   = $attributes['wrapLines'] ?? true;
		$align		   = $attributes['align'] 		?? '';
		$customClass = $attributes['className'] ?? '';

		# Random ID for this code to multiple instances of CodeMirror
		$uid = rand();

		# Get alignment
		if( $align !== '' ) {
			$align = 'align' . $align;
		}

		# Get language Label and Mode
		$languages = Languages::getLanguagesList();
		$key = array_search( $language, array_column( $languages, 'value' ) );
		$lang_slug = $language;
		$lang_label = $languages[$key]['label'];
		$lang_mode = $languages[$key]['mode'];
		$lang_mime = isset( $languages[$key]['mime'] ) ? $languages[$key]['mime'] : '';

		# Generate HTML
		$output = "";
		ob_start();

		# Get template
		include apply_filters( 'prettycode_template', Plugin::path() . 'templates/code.php' );

		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}
