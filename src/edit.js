import { Fragment } from "@wordpress/element"

import Inspector from "./inspector"
import Block from "./block"

import "./editor.scss"

export default function Edit(props) {
  const { attributes, setAttributes } = props

  return (
    <Fragment>
      <Inspector {...{ attributes, setAttributes }} />
      <Block {...{ attributes, setAttributes }} />
    </Fragment>
  )
}
