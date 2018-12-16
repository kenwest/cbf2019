<?php

/**
 * Implementation of hook_preprocess_html().
 */
function cbf2019_preprocess_html(&$variables) {
  drupal_add_css(drupal_get_path('theme', 'cbf2019') . '/css/custom.css', array('group' => CSS_THEME));
}
