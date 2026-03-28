<?php

namespace PrettyCode;

defined('ABSPATH') || exit;

abstract class Themes
{
	/**
	 * Get Themes List
	 *
	 * @return array
	 */
	public static function getThemesList(): array
	{
		$themes = [
			['value' => 'hopscotch',          'label' => 'Hopscotch'],
			['value' => 'abcdef',             'label' => 'ABCDEF'],
			['value' => 'abyss',              'label' => 'Abyss'],
			['value' => 'androidstudio',      'label' => 'Android Studio'],
			['value' => 'atomone',            'label' => 'Atom One'],
			['value' => 'aura',               'label' => 'Aura'],
			['value' => 'bbedit',             'label' => 'BBEdit'],
			['value' => 'bespin',             'label' => 'Bespin'],
			['value' => 'darcula',            'label' => 'Darcula'],
			['value' => 'dracula',            'label' => 'Dracula'],
			['value' => 'eclipse',            'label' => 'Eclipse'],
			['value' => 'github',             'label' => 'GitHub'],
			['value' => 'github-dark',        'label' => 'GitHub Dark'],
			['value' => 'gruvbox-dark',       'label' => 'Gruvbox Dark'],
			['value' => 'gruvbox-light',      'label' => 'Gruvbox Light'],
			['value' => 'material',           'label' => 'Material'],
			['value' => 'material-darker',    'label' => 'Material Darker'],
			['value' => 'material-palenight', 'label' => 'Material Palenight'],
			['value' => 'monokai',            'label' => 'Monokai'],
			['value' => 'nord',               'label' => 'Nord'],
			['value' => 'okaidia',            'label' => 'Okaidia'],
			['value' => 'solarized',          'label' => 'Solarized'],
			['value' => 'solarized-dark',     'label' => 'Solarized Dark'],
			['value' => 'sublime',            'label' => 'Sublime'],
			['value' => 'tokyo-night',        'label' => 'Tokyo Night'],
			['value' => 'tokyo-night-day',    'label' => 'Tokyo Night Day'],
			['value' => 'tokyo-night-storm',  'label' => 'Tokyo Night Storm'],
			['value' => 'vscode-dark',        'label' => 'VS Code Dark'],
			['value' => 'vscode-light',       'label' => 'VS Code Light'],
		];

		return apply_filters('prettycode_themes_list', $themes);
	}
}
