<?php
/**
 * Plugin Name:       PrettyCode • Syntax highlighting with CodeMirror
 * Description:       Code snippets highlighting made simple, for the WordPress editor.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.0.7
 * Author:            Maxime BJ • Captain WP
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       prettycode
 *
 * @package           create-block
 */

defined( 'ABSPATH' ) || exit;

class PrettyCode
{
	public function run()
	{
		# Load Files
		require_once __DIR__ . '/classes/Plugin.php';
		require_once __DIR__ . '/classes/Languages.php';
		require_once __DIR__ . '/classes/Themes.php';
		require_once __DIR__ . '/classes/Back.php';
		require_once __DIR__ . '/classes/Front.php';
		require_once __DIR__ . '/classes/Block.php';

		# Init Classes
		(new PrettyCode\Back)->registerHooks();
		(new PrettyCode\Front)->registerHooks();
		(new PrettyCode\Block)->registerHooks();
	}
}

(new PrettyCode)->run();
