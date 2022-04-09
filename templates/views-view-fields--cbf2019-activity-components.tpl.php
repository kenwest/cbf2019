<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */

$embeddedView = $row->field_field_summary[0]['raw']['value'] ?? '';

if ($embeddedView) {
  $embeddedView = explode(',', $embeddedView);
  $parameters = [];
  foreach ($embeddedView as $i => $v) {
    $v = trim($v);
    switch ($v) {
      case 'activity':
        $activity = $row->nid;
        $parameters[] = $activity;
        break;
      case 'ministry_centre':
        $highlightLocation = $view->exposed_data['field_highlight_location_tid'];
        $ministryCentre = _cbf_convert_banner_to_city_tid($highlightLocation);
        $parameters[] = $ministryCentre;
        break;
      case 'domain':
        $currentDomain = domain_get_domain()['domain_id'];
        $parameters[] = $currentDomain;
        break;
      case 'title':
        $defaultTitle = $row->field_field_title_1[0]['rendered']['#markup'] ?? '';
        $title = $row->field_field_title[0]['rendered']['#markup'] ?? $defaultTitle;
        $parameters[] = $title;
        break;
      default:
        $parameters[] = $v;
        break;
    }
  }

  if (count($parameters) >= 2) {
    print call_user_func_array('views_embed_view', $parameters);
  }
}
else {

  $blockContent = $row->field_field_description[0]['rendered']['#markup'] ?? '';

  if ($blockContent) {
    print '<div class="view view-cbf2019-activity-components-block views-1-row">';
    print   '<div class="clearfix"></div>';
    print   '<div class="view-content">';
    print     '<div class="views-row views-row-1 views-row-odd views-row-first views-row-last">';
    print       '<div class="views-field">';
    print         '<div class="field-content">';
    print           $blockContent;
    print         '</div>';
    print       '</div>';
    print     '</div>';
    print   '</div>';
    print '</div>';
  }
}
