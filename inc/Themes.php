<?php

namespace PrettyCode;

defined( 'ABSPATH' ) || exit;

Abstract class Themes
{
	/**
   * Get Themes List
	 *
	 * @return array
	 */
	public static function getThemesList(): array
	{
		$themes = [
			[ 'value' => 'hopscotch' , 'label' => 'Hopscotch' ],
			[ 'value' => '3024-day' , 'label' => '3024 Day' ],
			[ 'value' => '3024-night' , 'label' => '3024 Night' ],
			[ 'value' => 'abcdef' , 'label' => 'ABCDEF' ],
			[ 'value' => 'ambiance' , 'label' => 'Ambiance' ],
			[ 'value' => 'ambiance-mobile' , 'label' => 'Ambiance-mobile' ],
			[ 'value' => 'base16-dark' , 'label' => 'Base16 Dark' ],
			[ 'value' => 'base16-light' , 'label' => 'Base16 Light' ],
			[ 'value' => 'bespin' , 'label' => 'Bespin' ],
			[ 'value' => 'blackboard' , 'label' => 'Blackboard' ],
			[ 'value' => 'cobalt' , 'label' => 'Cobalt' ],
			[ 'value' => 'colorforth' , 'label' => 'Colorforth' ],
			[ 'value' => 'darcula' , 'label' => 'Darcula' ],
			[ 'value' => 'dracula' , 'label' => 'Dracula' ],
			[ 'value' => 'duotone-dark' , 'label' => 'Duotone Dark' ],
			[ 'value' => 'duotone-light' , 'label' => 'Duotone Light' ],
			[ 'value' => 'eclipse' , 'label' => 'Eclipse' ],
			[ 'value' => 'elegant' , 'label' => 'Elegant' ],
			[ 'value' => 'erlang-dark' , 'label' => 'Erlang Dark' ],
			[ 'value' => 'gruvbox-dark' , 'label' => 'Gruvbox Dark' ],
			[ 'value' => 'icecoder' , 'label' => 'Icecoder' ],
			[ 'value' => 'idea' , 'label' => 'Idea' ],
			[ 'value' => 'isotope' , 'label' => 'Isotope' ],
			[ 'value' => 'lesser-dark' , 'label' => 'Lesser Dark' ],
			[ 'value' => 'liquibyte' , 'label' => 'Liquibyte' ],
			[ 'value' => 'lucario' , 'label' => 'Lucario' ],
			[ 'value' => 'material' , 'label' => 'Material' ],
			[ 'value' => 'mbo' , 'label' => 'MBO' ],
			[ 'value' => 'mdn-like' , 'label' => 'MDN like' ],
			[ 'value' => 'midnight' , 'label' => 'Midnight' ],
			[ 'value' => 'monokai' , 'label' => 'Monokai' ],
			[ 'value' => 'neat' , 'label' => 'Neat' ],
			[ 'value' => 'neo' , 'label' => 'Neo' ],
			[ 'value' => 'night' , 'label' => 'Night' ],
			[ 'value' => 'oceanic-next' , 'label' => 'Oceanic Next' ],
			[ 'value' => 'panda-syntax' , 'label' => 'Panda Syntax' ],
			[ 'value' => 'paraiso-dark' , 'label' => 'Paraiso Dark' ],
			[ 'value' => 'paraiso-light' , 'label' => 'Paraison Light' ],
			[ 'value' => 'pastel-on-dark' , 'label' => 'Pastel On Dark' ],
			[ 'value' => 'railscasts' , 'label' => 'Railscasts' ],
			[ 'value' => 'rubyblue' , 'label' => 'Rubyblue' ],
			[ 'value' => 'seti' , 'label' => 'Seti' ],
			[ 'value' => 'shadowfox' , 'label' => 'Shadowfox' ],
			[ 'value' => 'solarized' , 'label' => 'Solarized' ],
			[ 'value' => 'ssms' , 'label' => 'SSMS' ],
			[ 'value' => 'the-matrix' , 'label' => 'The Matrix' ],
			[ 'value' => 'tomorrow-night-bright' , 'label' => 'Tomorrow Night Bright' ],
			[ 'value' => 'tomorrow-night-eighties' , 'label' => 'Tomorrow Night Eighties' ],
			[ 'value' => 'ttcn' , 'label' => 'TTCN' ],
			[ 'value' => 'twilight' , 'label' => 'Twilight' ],
			[ 'value' => 'vibrant-ink' , 'label' => 'Vibrant Ink' ],
			[ 'value' => 'xq-dark' , 'label' => 'XQ Dark' ],
			[ 'value' => 'xq-light' , 'label' => 'XQ Light' ],
			[ 'value' => 'yeti' , 'label' => 'Yeti' ],
			[ 'value' => 'zenburn' , 'label' => 'Zenburn' ],
		];

		return apply_filters( 'prettycode_themes_list', $themes );
	}
}
