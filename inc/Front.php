<?php

namespace ANiceBlockCode;

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
		// TODO
	}

}
