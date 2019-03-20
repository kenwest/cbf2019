<?php

/**
 * Implementation of hook_preprocess_html().
 */
function cbf2019_preprocess_html(&$variables) {
  drupal_add_css(
    'https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500',
    array('group' => CSS_THEME)
    );
  drupal_add_css(
    drupal_get_path('theme', 'cbf2019') . '/css/custom.css',
    array('group' => CSS_THEME)
  );
}

/*
 * An implementation of theme_entity_property()
 */
function cbf2019_entity_property($variables) {
  return cbf_entity_property($variables);
}
