import { EditorState } from "@codemirror/state"
import { EditorView, lineNumbers } from "@codemirror/view"

import { LANGUAGE_MAP } from "./languages"
import { THEME_MAP } from "./themes"

document.querySelectorAll(".prettycode-editor").forEach((el) => {
  const dataEl = el.querySelector(".prettycode-data")
  if (!dataEl) return

  const {
    source = "",
    mode = "",
    theme = "hopscotch",
    showLines = true,
    startLine = 1,
    wrapLines = true,
  } = JSON.parse(dataEl.textContent)

  const langExtension = LANGUAGE_MAP[mode]
  const themeExtension = THEME_MAP[theme] ?? THEME_MAP.hopscotch

  new EditorView({
    state: EditorState.create({
      doc: source,
      extensions: [
        EditorView.editable.of(false),
        themeExtension,
        ...(langExtension ? [langExtension] : []),
        ...(showLines
          ? [lineNumbers({ formatNumber: (n) => String(n + startLine - 1) })]
          : []),
        ...(wrapLines ? [EditorView.lineWrapping] : []),
      ],
    }),
    parent: el,
  })
})
