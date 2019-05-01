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

/*
 * An implementation of theme_pager_link()
 *
 * It's a copy of rhythm_pager_link() but ...
 *  - uses FontAwesome 5 icons
 */
function cbf2019_pager_link($variables) {
  $text = $variables['text'];
  $page_new = $variables['page_new'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $attributes = $variables['attributes'];

  $page = isset($_GET['page']) ? $_GET['page'] : '';
  if ($new_page = implode(',', pager_load_array($page_new[$element], $element, explode(',', $page)))) {
    $parameters['page'] = $new_page;
  }

  $query = array();
  if (count($parameters)) {
    $query = drupal_get_query_parameters($parameters, array());
  }
  if ($query_pager = pager_get_query_parameters()) {
    $query = array_merge($query, $query_pager);
  }

  // Set each pager link title
  if (!isset($attributes['title'])) {
    static $titles = NULL;
    if (!isset($titles)) {
      $titles = array(
        t('«') => t('Go to first page'),
        t('‹') => t('Go to previous page'),
        t('›') => t('Go to next page'),
        t('»') => t('Go to last page'),
      );
    }
    if (isset($titles[$text])) {
      $attributes['title'] = $titles[$text];
    }
    elseif (is_numeric($text)) {
      $attributes['title'] = t('Go to page @number', array('@number' => $text));
    }
  }
  $replace_titles = array(
    t('« first') => '<i class="fal fa-angle-double-left"></i> First',
    t('‹ previous') => '<i class="fal fa-angle-left"></i> Previous',
    t('next ›') => 'Next <i class="fal fa-angle-right"></i>',
    t('last »') => 'Last <i class="fal fa-angle-double-right"></i>',
  );
  $text = isset($replace_titles[$text]) ? $replace_titles[$text] : check_plain($text);

  $attributes['href'] = url($_GET['q'], array('query' => $query));
  return '<a' . drupal_attributes($attributes) . '>' . $text . '</a>';
}
