<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>

<div id="sticky-wrapper" class="sticky-wrapper" style="height: 75px;">
  <?php
    print rhythm_shortcodes_shortcode_menu(
      [
        'menu' => 'menu-cbf-2019-main-menu',
        /* 'fid' => Use the theme logo by default */
        'type' => 'white',
        'transparent' => false,
        'search' => true,
        'cart' => false,
        'language' => false,
      ],
      ''
    );
  ?>
</div>
<?php
  $fid = 0;
  if (isset($view->result)) {
    $result = reset($view->result);
    $imageFieldsByPreference = [
      'field_field_title_image',
      'field_field_title_image_1',
    ];
    foreach ($imageFieldsByPreference as $imageField) {
      if (!empty($result->$imageField)) {
        $image = reset($result->$imageField);
        $fid = $image['raw']['fid'];
        break;
      }
    }
  }
  print rhythm_shortcodes_shortcode_header(
    [
      'class' => '',
      'size' => 'page-section',
      'description' => '',
      /* 'title' => Use drupal_get_title by default */
      'fid' => $fid,
      'type' => 'bg-dark-alfa-50',
      'breadcrumbs' => true,
    ],
    ''
  );
?>
