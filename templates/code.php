<div class="wp-block-a-nice-code-block-code-block <?php echo $align; ?> <?php echo $customClass; ?>">
  <header class="ancb-header">
    <div class="ancb-lang is-lang-<?php echo $lang_slug; ?>">
      <?php echo $lang_label; ?>
    </div>
    <div class="ancb-file">
      <?php echo $file; ?>
    </div>
  </header>
  <textarea
    class="ancb-source"
    name="codemirror-<?php echo $uid; ?>"
    id="codemirror-<?php echo $uid; ?>"
  ><?php echo esc_html( $source ); ?></textarea>
  <script>
    CodeMirror.fromTextArea( document.getElementById('codemirror-<?php echo $uid; ?>'), {
      mode: '<?php echo $lang_mime ?: $lang_mode; ?>',
      readOnly: true,
      theme: '<?php echo $theme; ?>',
      lineNumbers: <?php echo ( $showLines ) ? 'true' : 'false'; ?>,
      firstLineNumber: <?php echo $startLine; ?>,
      matchBrackets: true,
      indentUnit: 4,
      tabSize: 4,
      lineWrapping: <?php echo ( $wrapLines ) ? 'true' : 'false'; ?>,
    } );
  </script>
</div>
