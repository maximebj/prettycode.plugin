<?php

namespace PrettyCode;

defined( 'ABSPATH' ) || exit;

abstract class Languages
{
	/**
   * Get Languages List
	 *
	 * Some languages uses the same mode in CodeMirror
	 * Eg: PHP and Java uses C-Like mode
	 * More: https://codemirror.net/mode/
	 *
	 * @return array
	 */
	public static function getLanguagesList(): array
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

		return apply_filters( 'prettycode_languages_list', $languages );
	}
}
