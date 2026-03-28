import { useMemo } from "@wordpress/element"
import { useBlockProps } from "@wordpress/block-editor"
import CodeMirror from "@uiw/react-codemirror"
import { bracketMatching } from "@codemirror/language"
import { lineNumbers, EditorView } from "@codemirror/view"

import { LANGUAGE_MAP } from "./languages"
import { THEME_MAP } from "./themes"

export default function Block({ attributes, setAttributes }) {
  const { language, theme, file, source, showLines, startLine, wrapLines } =
    attributes

  const languageObject =
    prettyCode.languages.find((l) => l.value === language) ||
    prettyCode.languages[0]

  const langExtension = LANGUAGE_MAP[languageObject.mode]
  const themeExtension = THEME_MAP[theme] ?? THEME_MAP.hopscotch

  // Theme is included in extensions (not the `theme` prop) so that changes
  // to the theme attribute reliably trigger a CM6 reconfigure via useMemo.
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
