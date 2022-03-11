=== PrettyCode • Code syntax highlighting with CodeMirror ===
Contributors:      Maxime BJ
Tags:              block
Tested up to:      5.9
Stable tag:        1.0.7
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

A simple block to highlight code with 20+ languages and 50+ themes, for the WordPress editor.

== Description ==

The prettiest syntax highlighting block for the WordPress editor.
Live edit your code snippets in the admin with bracket matching, customize colors with more thant 50 themes (Base16, Monokai, Material, Zenburn, Hopscotch...).
Compatible with major languages: HTML, CSS, JS, JSX, Stylus, Sass, PHP, Python, C, C++, C#, Java, XML, Shell, JSON, Go, Swift...

This block uses CodeMirror. You may have seen this block before on the Advanced Gutenberg Blocks plugins few years ago. It's now an updated and standalone block.

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/prettycode` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress
3. Go to a post and click on 'Add block'
4. Search for 'PrettyCode'

== Frequently Asked Questions ==

= Which languages are available? =

All major language are available: HTML, CSS, JS, JSX, Stylus, Sass, PHP, Python, C, C++, C#, Java, XML, Shell, JSON, Go, Swift...

= Can I add more languages ? =

Yes, by using the filter `prettycode_languages_list`.

= Can I customize the appearance? =

Sure! You have access to 50+ dark and light themes like Base16, Monokai, Material, Zenburn, Hopscotch...

= Can I contribute? =

Yep! The public repository is right here: https://github.com/maximebj/prettycode.plugin

== Screenshots ==

== Changelog ==

= 1.0.7 =
* Fixed code editor line height

= 1.0.6 =
* Added translation for JS files
* Fixed a bug with PHP block

= 1.0 =
* Initial release

== Third Party ==

This plugins uses some third party libraries:

- WordPress create-block by gziolo - https://www.npmjs.com/package/@wordpress/create-block
- CodeMirror - https://github.com/codemirror/CodeMirror
- react-codemirror2 by scniro - https://github.com/scniro/react-codemirror2

A big thanks to their respective creators and maintainers!
