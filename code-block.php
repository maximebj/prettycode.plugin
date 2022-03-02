<?php
/**
 * Plugin Name:       A Nice Code Block • Syntax highlighting
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

function create_block_code_block_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'create_block_code_block_block_init' );
