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

<div class="view-content">
  <div id="sticky-wrapper" class="sticky-wrapper" style="height: 75px;">
  <?php

    $domainName = domain_lookup(domain_get_domain()['domain_id'])['machine_name'];
    switch ($domainName){
      case 'christian':
        $mainMenuName = 'menu-cbf-2019-plus-menu';
        break;

      default:
        $mainMenuName = 'menu-cbf-2019-main-menu';
        break;
    }

    print rhythm_shortcodes_shortcode_menu(
      [
        'menu' => $mainMenuName,
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
  $h2 = '';
  if (!empty($view->result)) {
    $result = reset($view->result);
    $imageFieldsByPreference = [
      'field_field_title_image',
      'field_field_title_image_1',
      'views_field_view_view',
    ];
    foreach ($imageFieldsByPreference as $imageField) {
      if (!empty($result->$imageField)) {
        if (is_string($result->$imageField)) {
          $fid = intval(preg_replace('/\s+/', '', strip_tags($result->$imageField)));
          if (!empty($fid)) {
            $imageFile = file_load($fid);
            $imageUrl = file_create_url($imageFile->uri);
            $imageStyleUrl = image_style_url('title', $imageFile->uri);
          }
        }
        else {
          $image = reset($result->$imageField);
          $fid = $image['rendered']['#item']['fid'];
          $imageUrl = file_create_url($image['rendered']['#item']['uri']);
          $imageStyleUrl = image_style_url($image['rendered']['#image_style'], $image['rendered']['#item']['uri']);
        }
        break;
      }
    }
    $h2FieldsByPreference = [
      'field_field_subtitle',
      'civicrm_event_summary',
    ];
    foreach ($h2FieldsByPreference as $h2Field) {
      if (!empty($result->$h2Field)) {
        if (is_string($result->$h2Field)) {
          $h2 = $result->$h2Field;
        }
        else {
          $h2 = reset($result->$h2Field);
          $h2 = $h2['rendered']['#markup'];
        }
        break;
      }
    }
  }
  $shortCodeHeader = rhythm_shortcodes_shortcode_header(
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
  if (empty($imageUrl) || empty($imageStyleUrl)) {
    print $shortCodeHeader;
  }
  else {
    print str_replace($imageUrl, $imageStyleUrl, $shortCodeHeader);
  }

  if (!empty($h2)) {
    print '<h2 class="element-invisible">' . $h2 . '</h2>';
  }
?>
</div>
