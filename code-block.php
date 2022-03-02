<?php
/**
 * Plugin Name:       A Nice Code Block • Syntax highlighting with CodeMirror
 * Description:       Code highlighting made simple, for the WordPress editor.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.0
 * Author:            MaximeBJ
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       code-block
 *
 * @package           create-block
 */

defined( 'ABSPATH' ) || exit;

class ANiceBlockCode
{
	public function run(): void
	{
		add_action( 'init', [ $this, 'registerBlocks' ] );
		add_action( 'enqueue_block_editor_assets', [ $this, 'sentDataToJS' ] );

		add_filter( 'no_texturize_tags', [ $this, 'doNotTexturizeTags' ] );
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
	public function registerBlocks(): void
	{
		register_block_type( __DIR__ . '/build' );
	}


	/**
   * Send data from PHP to JS
	 *
	 * @return void
	 */
	public function sentDataToJS(): void
	{
		wp_localize_script(
			'wp-block-editor',
			'aNiceCodeBlock',
			[
				'themes' => $this->getThemesList(),
				'languages' => $this->getLanguagesList(),
			],
		);
	}


	/**
   * Avoid issues with tags texturization in code
	 *
	 * Eg: when writing --checkout in a code snippet
	 *
	 * @return array
	 */
	public function doNotTexturizeTags( $tags ): array
	{
		$tags[] = 'textarea';
		return $tags;
	}


	/**
   * Get Languages List
	 *
	 * Some languages uses the same mode in CodeMirror
	 * Eg: PHP and Java uses C-Like mode
	 * More: https://codemirror.net/mode/
	 *
	 * @return array
	 */
	protected function getLanguagesList(): array
	{
		$languages = [
			[ 'value' => "html", 'mode' => 'xml', 'label' => 'HTML' ],
			[ 'value' => "css", 'mode' => 'css', 'label' => 'CSS' ],
			[ 'value' => "php", 'mode' => 'php', 'label' => 'PHP' ],
			[ 'value' => "js", 'mode' => 'javascript', 'label' => 'JS' ],
			[ 'value' => "ts", 'mode' => 'javascript', 'label' => 'TypeScript', 'mime' => 'application/typescript' ],
			[ 'value' => "json", 'mode' => 'javascript', 'label' => 'JSON', 'mime' => 'application/json' ],
			[ 'value' => "jsx", 'mode' => 'jsx', 'label' => 'JSX' ],
			[ 'value' => "xml", 'mode' => 'xml', 'label' => 'XML' ],
			[ 'value' => "sass", 'mode' => 'sass', 'label' => 'Sass' ],
			[ 'value' => "stylus", 'mode' => 'stylus', 'label' => 'Stylus' ],
			[ 'value' => "python",	'mode' => 'python', 'label' => 'Python' ],
			[ 'value' => "go", 'mode' => 'go', 'label' => 'Go' ],
			[ 'value' => "ruby", 'mode' => 'ruby', 'label' => 'Ruby' ],
			[ 'value' => "java", 'mode' => 'clike', 'label' => 'Java' ],
			[ 'value' => "c", 'mode' => 'clike', 'label' => 'C' ],
			[ 'value' => "c++", 'mode' => 'clike', 'label' => 'C++' ],
			[ 'value' => "c#", 'mode' => 'clike', 'label' => 'C#' ],
			[ 'value' => "objective-c", 'mode' => 'clike', 'label' => 'Objective C' ],
			[ 'value' => "swift", 'mode' => 'swift', 'label' => 'Swift' ],
			[ 'value' => "twig", 'mode' => 'twig', 'label' => 'Twig' ],
			[ 'value' => "django", 'mode' => 'django', 'label' => 'Django' ],
			[ 'value' => "shell", 'mode' => 'shell', 'label' => 'Shell' ],
			[ 'value' => "plain", 'mode' => '', 'label' => 'Plain Text' ],
		];

		return apply_filters( 'a_nice_code_block_languages_list', $languages );
	}


	/**
   * Get Themes List
	 *
	 * @return array
	 */
	protected function getThemesList(): array
	{
		$themes = [
			[ 'value' => '3024-day' , 'label' => '3024 Day' ],
			[ 'value' => '3024-night' , 'label' => '3024 Night' ],
			[ 'value' => 'abcdef' , 'label' => 'ABCDEF' ],
			[ 'value' => 'ambiance' , 'label' => 'Ambiance' ],
			[ 'value' => 'ambiance-mobile' , 'label' => 'Ambiance-mobile' ],
			[ 'value' => 'base16-dark' , 'label' => 'Base16 Dark' ],
			[ 'value' => 'base16-light' , 'label' => 'Base16 Light' ],
			[ 'value' => 'bespin' , 'label' => 'Bespin' ],
			[ 'value' => 'blackboard' , 'label' => 'Blackboard' ],
			[ 'value' => 'cobalt' , 'label' => 'Cobalt' ],
			[ 'value' => 'colorforth' , 'label' => 'Colorforth' ],
			[ 'value' => 'darcula' , 'label' => 'Darcula' ],
			[ 'value' => 'dracula' , 'label' => 'Dracula' ],
			[ 'value' => 'duotone-dark' , 'label' => 'Duotone Dark' ],
			[ 'value' => 'duotone-light' , 'label' => 'Duotone Light' ],
			[ 'value' => 'eclipse' , 'label' => 'Eclipse' ],
			[ 'value' => 'elegant' , 'label' => 'Elegant' ],
			[ 'value' => 'erlang-dark' , 'label' => 'Erlang Dark' ],
			[ 'value' => 'gruvbox-dark' , 'label' => 'Gruvbox Dark' ],
			[ 'value' => 'hopscotch' , 'label' => 'Hopscotch' ],
			[ 'value' => 'icecoder' , 'label' => 'Icecoder' ],
			[ 'value' => 'idea' , 'label' => 'Idea' ],
			[ 'value' => 'isotope' , 'label' => 'Isotope' ],
			[ 'value' => 'lesser-dark' , 'label' => 'Lesser Dark' ],
			[ 'value' => 'liquibyte' , 'label' => 'Liquibyte' ],
			[ 'value' => 'lucario' , 'label' => 'Lucario' ],
			[ 'value' => 'material' , 'label' => 'Material' ],
			[ 'value' => 'mbo' , 'label' => 'MBO' ],
			[ 'value' => 'mdn-like' , 'label' => 'MDN like' ],
			[ 'value' => 'midnight' , 'label' => 'Midnight' ],
			[ 'value' => 'monokai' , 'label' => 'Monokai' ],
			[ 'value' => 'neat' , 'label' => 'Neat' ],
			[ 'value' => 'neo' , 'label' => 'Neo' ],
			[ 'value' => 'night' , 'label' => 'Night' ],
			[ 'value' => 'oceanic-next' , 'label' => 'Oceanic Next' ],
			[ 'value' => 'panda-syntax' , 'label' => 'Panda Syntax' ],
			[ 'value' => 'paraiso-dark' , 'label' => 'Paraiso Dark' ],
			[ 'value' => 'paraiso-light' , 'label' => 'Paraison Light' ],
			[ 'value' => 'pastel-on-dark' , 'label' => 'Pastel On Dark' ],
			[ 'value' => 'railscasts' , 'label' => 'Railscasts' ],
			[ 'value' => 'rubyblue' , 'label' => 'Rubyblue' ],
			[ 'value' => 'seti' , 'label' => 'Seti' ],
			[ 'value' => 'shadowfox' , 'label' => 'Shadowfox' ],
			[ 'value' => 'solarized' , 'label' => 'Solarized' ],
			[ 'value' => 'ssms' , 'label' => 'SSMS' ],
			[ 'value' => 'the-matrix' , 'label' => 'The Matrix' ],
			[ 'value' => 'tomorrow-night-bright' , 'label' => 'Tomorrow Night Bright' ],
			[ 'value' => 'tomorrow-night-eighties' , 'label' => 'Tomorrow Night Eighties' ],
			[ 'value' => 'ttcn' , 'label' => 'TTCN' ],
			[ 'value' => 'twilight' , 'label' => 'Twilight' ],
			[ 'value' => 'vibrant-ink' , 'label' => 'Vibrant Ink' ],
			[ 'value' => 'xq-dark' , 'label' => 'XQ Dark' ],
			[ 'value' => 'xq-light' , 'label' => 'XQ Light' ],
			[ 'value' => 'yeti' , 'label' => 'Yeti' ],
			[ 'value' => 'zenburn' , 'label' => 'Zenburn' ],
		];

		return apply_filters( 'a_nice_code_block_themes_list', $themes );
	}
}

(new ANiceBlockCode)->run();
