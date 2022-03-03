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
 * Text Domain:       a-nice-code-block
 *
 * @package           create-block
 */

defined( 'ABSPATH' ) || exit;

class ANiceBlockCode
{
	public function run()
	{
		# Load Files
		require_once __DIR__ . '/inc/Languages.php';
		require_once __DIR__ . '/inc/Themes.php';
		require_once __DIR__ . '/inc/Back.php';
		require_once __DIR__ . '/inc/Front.php';

		# Init Classes
		(new ANiceBlockCode\Back)->registerHooks();
		(new ANiceBlockCode\Front)->registerHooks();
	}
}

(new ANiceBlockCode)->run();
