/**
 * Hopscotch theme for CodeMirror 6
 *
 * Original CM5 theme by Jan T. Sott (Base16 / Chris Kempson)
 * Ported to CM6 highlight tags for PrettyCode.
 */

import { EditorView } from "@codemirror/view"
import { HighlightStyle, syntaxHighlighting } from "@codemirror/language"
import { tags as t } from "@lezer/highlight"

const hopscotchTheme = EditorView.theme(
  {
    "&": {
      color: "#d5d3d5",
      backgroundColor: "#322931",
    },
    ".cm-content": {
      caretColor: "#989498",
    },
    ".cm-cursor, .cm-dropCursor": {
      borderLeftColor: "#989498",
    },
    "&.cm-focused .cm-selectionBackground, .cm-selectionBackground, .cm-content ::selection": {
      backgroundColor: "#433b42",
    },
    ".cm-activeLine": {
      backgroundColor: "#302020",
    },
    ".cm-selectionMatch": {
      backgroundColor: "#433b4288",
    },
    "&.cm-focused .cm-matchingBracket": {
      textDecoration: "underline",
      color: "white",
    },
    ".cm-gutters": {
      backgroundColor: "#322931",
      color: "#797379",
      border: "none",
    },
    ".cm-activeLineGutter": {
      backgroundColor: "#302020",
    },
    ".cm-panels": {
      backgroundColor: "#2c2528",
      color: "#d5d3d5",
    },
    ".cm-tooltip": {
      backgroundColor: "#3a3238",
      color: "#d5d3d5",
    },
    ".cm-tooltip-autocomplete ul li[aria-selected]": {
      backgroundColor: "#433b42",
      color: "#d5d3d5",
    },
  },
  { dark: true }
)

const hopscotchHighlightStyle = HighlightStyle.define([
  // Keywords: red
  { tag: [t.keyword, t.controlKeyword, t.moduleKeyword], color: "#dd464c" },

  // Strings: yellow
  { tag: [t.string, t.special(t.string), t.attributeValue], color: "#fdcc59" },

  // Numbers, atoms, booleans, null: pink/magenta
  { tag: [t.number, t.atom, t.bool, t.null], color: "#c85e7c" },

  // Function/method definitions: blue
  { tag: [t.function(t.variableName), t.function(t.propertyName)], color: "#1290bf" },

  // Variable definitions (def): orange
  { tag: [t.definition(t.variableName), t.definition(t.name)], color: "#fd8b19" },

  // Properties and attributes: green
  { tag: [t.propertyName, t.attributeName, t.variableName], color: "#8fc13e" },

  // Type names, class names: orange
  { tag: [t.typeName, t.className, t.namespace], color: "#fd8b19" },

  // Tags (HTML/XML): red
  { tag: t.tagName, color: "#dd464c" },

  // Operators, punctuation, brackets: default text color
  { tag: [t.bracket, t.paren, t.brace, t.punctuation, t.separator], color: "#d5d3d5" },
  { tag: t.operator, color: "#d5d3d5" },

  // Comments: dark orange/brown
  { tag: [t.comment, t.lineComment, t.blockComment, t.docComment], color: "#b33508", fontStyle: "italic" },

  // Links: pink
  { tag: t.link, color: "#c85e7c", textDecoration: "underline" },

  // Meta / processing instructions
  { tag: [t.meta, t.processingInstruction], color: "#797379" },

  // Markup
  { tag: [t.heading], color: "#dd464c", fontWeight: "bold" },
  { tag: t.emphasis, fontStyle: "italic" },
  { tag: t.strong, fontWeight: "bold" },
  { tag: t.strikethrough, textDecoration: "line-through" },

  // Invalid / error
  { tag: t.invalid, color: "#989498", backgroundColor: "#dd464c" },
])

export const hopscotch = [hopscotchTheme, syntaxHighlighting(hopscotchHighlightStyle)]
