<?php

namespace PrettyCode;

defined( 'ABSPATH' ) || exit;

abstract class Plugin
{
	const SLUG    = 'prettycode';
  const VERSION = '1.0.7';

	/**
   * Get Plugin path to directory
	 *
	 * @return string
	 */
	public static function path(): string
	{
		return plugin_dir_path( __DIR__ );
	}


	/**
   * Get Plugin URL to directory
	 *
	 * @return string
	 */
	public static function URL(): string
	{
		return plugin_dir_url( __DIR__ );
	}
}
