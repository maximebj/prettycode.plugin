import { useMemo } from "@wordpress/element"
import { useBlockProps } from "@wordpress/block-editor"
import CodeMirror from "@uiw/react-codemirror"
import { StreamLanguage, bracketMatching } from "@codemirror/language"
import { lineNumbers, EditorView } from "@codemirror/view"
import * as themes from "@uiw/codemirror-themes-all"
import { hopscotch } from "./theme/hopscotch"

// First-class CM6 language packages
import { javascript } from "@codemirror/lang-javascript"
import { css } from "@codemirror/lang-css"
import { html } from "@codemirror/lang-html"
import { php } from "@codemirror/lang-php"
import { markdown } from "@codemirror/lang-markdown"

// Legacy modes for additional language support
import { sCSS, less } from "@codemirror/legacy-modes/mode/css"
import { xml } from "@codemirror/legacy-modes/mode/xml"
import { python } from "@codemirror/legacy-modes/mode/python"
import { ruby } from "@codemirror/legacy-modes/mode/ruby"
import { shell } from "@codemirror/legacy-modes/mode/shell"
import { sql } from "@codemirror/legacy-modes/mode/sql"
import { c, cpp, java, csharp, kotlin, scala } from "@codemirror/legacy-modes/mode/clike"
import { go } from "@codemirror/legacy-modes/mode/go"
import { rust } from "@codemirror/legacy-modes/mode/rust"
import { yaml } from "@codemirror/legacy-modes/mode/yaml"
import { swift } from "@codemirror/legacy-modes/mode/swift"
import { lua } from "@codemirror/legacy-modes/mode/lua"
import { perl } from "@codemirror/legacy-modes/mode/perl"
import { powerShell } from "@codemirror/legacy-modes/mode/powershell"
import { haskell } from "@codemirror/legacy-modes/mode/haskell"
import { groovy } from "@codemirror/legacy-modes/mode/groovy"
import { dockerFile } from "@codemirror/legacy-modes/mode/dockerfile"
import { nginx } from "@codemirror/legacy-modes/mode/nginx"
import { toml } from "@codemirror/legacy-modes/mode/toml"

// Map CM5 mode names → CM6 language extensions
// First-class packages are preferred for top languages; legacy-modes cover the rest
const LANGUAGE_MAP = {
  javascript: javascript(),
  jsx: javascript({ jsx: true }),
  typescript: javascript({ typescript: true }),
  tsx: javascript({ jsx: true, typescript: true }),
  css: css(),
  scss: StreamLanguage.define(sCSS),
  less: StreamLanguage.define(less),
  htmlmixed: html(),
  html: html(),
  xml: StreamLanguage.define(xml),
  php: php(),
  python: StreamLanguage.define(python),
  ruby: StreamLanguage.define(ruby),
  shell: StreamLanguage.define(shell),
  bash: StreamLanguage.define(shell),
  sql: StreamLanguage.define(sql),
  mysql: StreamLanguage.define(sql),
  markdown: markdown(),
  c: StreamLanguage.define(c),
  cpp: StreamLanguage.define(cpp),
  java: StreamLanguage.define(java),
  csharp: StreamLanguage.define(csharp),
  kotlin: StreamLanguage.define(kotlin),
  scala: StreamLanguage.define(scala),
  go: StreamLanguage.define(go),
  rust: StreamLanguage.define(rust),
  yaml: StreamLanguage.define(yaml),
  swift: StreamLanguage.define(swift),
  lua: StreamLanguage.define(lua),
  perl: StreamLanguage.define(perl),
  powershell: StreamLanguage.define(powerShell),
  haskell: StreamLanguage.define(haskell),
  groovy: StreamLanguage.define(groovy),
  dockerfile: StreamLanguage.define(dockerFile),
  nginx: StreamLanguage.define(nginx),
  toml: StreamLanguage.define(toml),
}

// Map theme names (as defined in PHP) → @uiw/codemirror-themes-all extension objects.
// All values are CM6 Extensions so they can be included in the extensions array
// and react properly when the theme attribute changes.
const THEME_MAP = {
  default: themes.eclipse,
  dracula: themes.dracula,
  monokai: themes.monokai,
  material: themes.material,
  "material-darker": themes.materialDark,
  "material-palenight": themes.materialLight,
  solarized: themes.solarizedLight,
  "solarized-dark": themes.solarizedDark,
  eclipse: themes.eclipse,
  nord: themes.nord,
  aura: themes.aura,
  darcula: themes.darcula,
  bbedit: themes.bbedit,
  github: themes.githubLight,
  "github-dark": themes.githubDark,
  "gruvbox-dark": themes.gruvboxDark,
  "gruvbox-light": themes.gruvboxLight,
  "tokyo-night": themes.tokyoNight,
  "tokyo-night-storm": themes.tokyoNightStorm,
  "tokyo-night-day": themes.tokyoNightDay,
  "vscode-dark": themes.vscodeDark,
  "vscode-light": themes.vscodeLight,
  androidstudio: themes.androidstudio,
  atomone: themes.atomone,
  okaidia: themes.okaidia,
  sublime: themes.sublime,
  bespin: themes.bespin,
  abcdef: themes.abcdef,
  abyss: themes.abyss,
  hopscotch,
}

export default function Block({ attributes, setAttributes }) {
  const { language, theme, file, source, showLines, startLine, wrapLines } =
    attributes

  const languageObject =
    prettyCode.languages.find((l) => l.value === language) ||
    prettyCode.languages[0]

  const langExtension = LANGUAGE_MAP[languageObject.mode]
  const themeExtension = THEME_MAP[theme] ?? themes.dracula

  // Including themeExtension in the extensions array (rather than the theme prop)
  // ensures CodeMirror reacts when the theme attribute changes, since the extensions
  // array reference changes and triggers the internal reconfigure effect.
  const extensions = useMemo(
    () => [
      themeExtension,
      bracketMatching(),
      ...(langExtension ? [langExtension] : []),
      ...(showLines
        ? [lineNumbers({ formatNumber: (n) => String(n + startLine - 1) })]
        : []),
      ...(wrapLines ? [EditorView.lineWrapping] : []),
    ],
    [themeExtension, langExtension, showLines, startLine, wrapLines]
  )

  return (
    <div {...useBlockProps()}>
      <header className="prettycode-header">
        <div className={`prettycode-lang is-lang-${languageObject.value}`}>
          {languageObject.label}
        </div>
        <div className="prettycode-file">{file}</div>
      </header>

      <CodeMirror
        value={source}
        onChange={(value) => setAttributes({ source: value })}
        theme="none"
        extensions={extensions}
        basicSetup={{
          lineNumbers: false,
          foldGutter: false,
          highlightActiveLine: false,
        }}
      />
    </div>
  )
}
