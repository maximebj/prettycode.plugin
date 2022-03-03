<?php

namespace ANiceBlockCode;

use ANiceBlockCode\Languages;
use ANiceBlockCode\Themes;

defined( 'ABSPATH' ) || exit;

class Back
{
	/**
   * Registrer Hooks
	 *
	 * @return void
	 */
	public function registerHooks(): void
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
		register_block_type( plugin_dir_path( __DIR__ ) . '/build' );
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
				'themes' => Themes::getThemesList(),
				'languages' => Languages::getLanguagesList(),
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
}
