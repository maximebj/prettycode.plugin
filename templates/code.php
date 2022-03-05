<div class="wp-block-prettycode-code <?php echo esc_attr( $align ); ?> <?php echo esc_attr( $customClass ); ?>">
  <header class="prettycode-header">
    <div class="prettycode-lang is-lang-<?php echo esc_attr( $lang_slug ); ?>">
      <?php echo esc_attr( $lang_label ); ?>
    </div>
    <div class="prettycode-file">
      <?php echo esc_html( $file ); ?>
    </div>
  </header>
  <textarea
    class="prettycode-source"
    name="codemirror-<?php echo esc_attr( $uid ); ?>"
    id="codemirror-<?php echo esc_attr( $uid ); ?>"
  ><?php echo esc_html( $source ); ?></textarea>
  <script>
    CodeMirror.fromTextArea( document.getElementById('codemirror-<?php echo esc_attr( $uid ); ?>'), {
      mode: '<?php echo esc_attr( $lang_mime ?: $lang_mode ); ?>',
      readOnly: true,
      theme: '<?php echo esc_attr( $theme ); ?>',
      lineNumbers: <?php echo ( esc_attr( $showLines ) ) ? 'true' : 'false'; ?>,
      firstLineNumber: <?php echo esc_attr( $startLine ); ?>,
      matchBrackets: true,
      indentUnit: 4,
      tabSize: 4,
      lineWrapping: <?php echo ( esc_attr( $wrapLines ) ) ? 'true' : 'false'; ?>,
    } );
  </script>
</div>
