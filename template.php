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
  drupal_add_js(
    '//developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js',
    array('type' => 'external', 'scope' => 'footer'));
}

/**
 * An implementation of theme_entity_property()
 */
function cbf2019_entity_property($variables) {
  return cbf_entity_property($variables);
}

/**
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

/**
 * An implementation of theme_breadcrumb().
 *
 * Put a link to the front page on every non-front page.
 * Add links to the top-level menu item pages
 *  - civicrm_event => Events
 *  - activity => Activities
 *  - episode => Resources
 *  - blog => Blog
 */
function cbf2019_breadcrumb($variables) {
  static $cbf2019breadcrumb = false;

  if ($cbf2019breadcrumb !== false) {
    return $cbf2019breadcrumb;
  }

  $crumbs = [];
  if (!drupal_is_front_page()) {
    $crumbs[] = ['Home', '/'];

    $event = menu_get_object('civicrm_entity_loader');
    if (!empty($event) && is_object($event) && $event->entityType() == 'civicrm_event') {
      $crumbs[] = ["What's on", '/whats-on'];
    }
    else {
      $node = menu_get_object();
      if (!empty($node)) {
        switch ($node->type) {
          case 'activity':
            $crumbs[] = ["What's on", '/whats-on'];
            break;
          case 'episode':
            $crumbs[] = ['Resources', '/library'];
            break;
          case 'blog':
            $crumbs[] = ['Blog', '/articles'];
            break;
        }
      }
    }
  }

  $breadcrumb = [];
  foreach ($crumbs as $crumb) {
    if (empty($crumb[1])) {
      $item = $crumb[0];
    }
    else {
      $item = '<a href="' . $crumb[1] . '">' . $crumb[0] . '</a>';
    }
    $breadcrumb[] = '<span class="crumb">' . $item . '</span>';
  }

  if (empty($breadcrumb)) {
    $cbf2019breadcrumb = '';
  }
  else {
    $cbf2019breadcrumb
      = '<div class="mod-breadcrumbs align-right">' .
          implode(' / ', $breadcrumb) .
        '</div>';
  }

  return $cbf2019breadcrumb;
}

/**
 * An implementation of theme_status_messages()
 *
 * Changes the Rhythm function to use FontAwesome 5 icons
 */
function cbf2019_status_messages($variables) {
  $display = $variables['display'];
  $output = '<div class = "row"><div class = "col-md-8 col-md-offset-2">';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  $types = array(
    'status' => 'success',
    'error' => 'error',
    'warning' => 'notice',
  );
  $icons = array(
    'status' => 'fal fa-check-circle',
    'error' => 'fal fa-times-circle',
    'warning' => 'fal fa-exclamation-triangle',
  );

  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div class=\"alert " . $types[$type] . "\">\n<i class=\"" . $icons[$type] . "\"></i>";
    if (!empty($status_heading[$type])) {
      $output .= '<div class="element-invisible">' . $status_heading[$type] . "</div>\n";
    }
    if (count($messages) > 1) {
      foreach ($messages as $message) {
        $output .= '<p>' . $message . "</p>\n";
      }
    }
    else {
      $output .= $messages[0];
    }
    $output .= "</div>\n";
  }
  $output .= '</div></div>';

  return $output;
}

/**
 * Overrides theme_menu_local_tasks().
 */
function cbf2019_menu_local_tasks(array $variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<div class="element-invisible">' . t('Primary tabs') . '</div>';
    $variables['primary']['#prefix'] .= '<div class = "align-center mb-40 mb-xxs-30"><ul class="nav nav-tabs tpl-minimal-tabs">';
    $variables['primary']['#suffix'] = '</ul></div>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<div class="element-invisible">' . t('Secondary tabs') . '</div>';
    $variables['secondary']['#prefix'] .= '<div class = "align-center mb-40 mb-xxs-30"><ul class="nav nav-tabs tpl-minimal-tabs">';
    $variables['secondary']['#suffix'] = '</ul></div>';
    $output .= drupal_render($variables['secondary']);
  }

  return $output;
}

/**
 * Overrides theme_menu_tree().
 *
 * The Rhythm .default-menu CSS uses !important styling. Let's avoid that
 * to fix menu styling
 */
function cbf2019_menu_tree(&$variables) {
  return '<ul class = "cbf2019-default-menu">' . $variables['tree'] . '</ul>';
}