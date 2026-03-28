<div class="wp-block-prettycode-code <?php echo esc_attr($align); ?> <?php echo esc_attr($customClass); ?>">
  <header class="prettycode-header">
    <div class="prettycode-lang is-lang-<?php echo esc_attr($lang_slug); ?>">
      <?php echo esc_attr($lang_label); ?>
    </div>
    <div class="prettycode-file">
      <?php echo esc_html($file); ?>
    </div>
  </header>
  <div class="prettycode-editor">
    <script type="application/json" class="prettycode-data"><?php echo wp_json_encode([
      'source'    => $source,
      'mode'      => $lang_mode,
      'theme'     => $theme,
      'showLines' => (bool) $showLines,
      'startLine' => (int) $startLine,
      'wrapLines' => (bool) $wrapLines,
    ]); ?></script>
  </div>
</div>
