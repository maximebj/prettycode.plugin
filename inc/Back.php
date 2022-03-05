<?php

namespace PrettyCode;

use PrettyCode\Languages;
use PrettyCode\Themes;
use PrettyCode\Plugin;

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
		add_action( 'enqueue_block_editor_assets', [ $this, 'sentDataToJS' ] );
		add_filter( 'no_texturize_tags', [ $this, 'doNotTexturizeTags' ] );
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
			'prettyCode',
			[
				'url' => Plugin::URL(),
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
