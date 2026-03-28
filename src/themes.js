import * as t from "@uiw/codemirror-themes-all"
import { hopscotch } from "./theme/hopscotch"

// Map theme values (Themes.php `value` field) → CM6 Extension objects.
// All entries are Extensions (not strings) so they can be included directly
// in the extensions array and react reliably when the theme attribute changes.
// Keys must match the `value` values defined in classes/Themes.php.
export const THEME_MAP = {
  hopscotch,
  abcdef:             t.abcdef,
  abyss:              t.abyss,
  androidstudio:      t.androidstudio,
  atomone:            t.atomone,
  aura:               t.aura,
  bbedit:             t.bbedit,
  bespin:             t.bespin,
  darcula:            t.darcula,
  dracula:            t.dracula,
  eclipse:            t.eclipse,
  github:             t.githubLight,
  "github-dark":      t.githubDark,
  "gruvbox-dark":     t.gruvboxDark,
  "gruvbox-light":    t.gruvboxLight,
  material:           t.material,
  "material-darker":  t.materialDark,
  "material-palenight": t.materialLight,
  monokai:            t.monokai,
  nord:               t.nord,
  okaidia:            t.okaidia,
  solarized:          t.solarizedLight,
  "solarized-dark":   t.solarizedDark,
  sublime:            t.sublime,
  "tokyo-night":      t.tokyoNight,
  "tokyo-night-day":  t.tokyoNightDay,
  "tokyo-night-storm": t.tokyoNightStorm,
  "vscode-dark":      t.vscodeDark,
  "vscode-light":     t.vscodeLight,
}
