import { StreamLanguage } from "@codemirror/language"

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
import { c, cpp, java, csharp, kotlin, scala, clike } from "@codemirror/legacy-modes/mode/clike"
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
import { sass } from "@codemirror/legacy-modes/mode/sass"
import { stylus } from "@codemirror/legacy-modes/mode/stylus"

// Map mode names (Languages.php `mode` field) → CM6 language extensions.
// Keys must match the `mode` values defined in classes/Languages.php.
export const LANGUAGE_MAP = {
  // First-class CM6 packages
  javascript: javascript(),
  jsx: javascript({ jsx: true }),
  typescript: javascript({ typescript: true }),
  tsx: javascript({ jsx: true, typescript: true }),
  css: css(),
  htmlmixed: html(),
  html: html(),
  xml: html(), // HTML with XML syntax
  php: php(),
  markdown: markdown(),

  // CSS pre-processors
  scss: StreamLanguage.define(sCSS),
  less: StreamLanguage.define(less),
  sass: StreamLanguage.define(sass),
  stylus: StreamLanguage.define(stylus),

  // C-family: `clike` is the catch-all used for java/c/c++/c#/objective-c
  clike: StreamLanguage.define(clike),
  c: StreamLanguage.define(c),
  cpp: StreamLanguage.define(cpp),
  java: StreamLanguage.define(java),
  csharp: StreamLanguage.define(csharp),
  kotlin: StreamLanguage.define(kotlin),
  scala: StreamLanguage.define(scala),

  // Other languages
  python: StreamLanguage.define(python),
  ruby: StreamLanguage.define(ruby),
  shell: StreamLanguage.define(shell),
  bash: StreamLanguage.define(shell),
  sql: StreamLanguage.define(sql),
  mysql: StreamLanguage.define(sql),
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
