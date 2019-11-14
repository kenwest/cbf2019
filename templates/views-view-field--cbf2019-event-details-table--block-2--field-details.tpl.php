<?php

/**
 *
 * If the field_logo needs to be displayed as an SVG OBJECT element, then the normal
 * Views rewriting won't work as Views strips out OBJECT elements as unsafe. But Views
 * is happy this is supplied in a template.
 *
 * To use this feature ...
 *   . Format the field_logo as a 'Download URL'
 *   . Rewrite the field to '###[field_logo]###'
 *   . The output will be '<object data="URL" type="image/svg+xml"></object>'
 *   . When rewriting the field, keep it on one line
 *
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<?php
  if (!empty($output)) {
    preg_match('!<caption>([^<]+)</caption>!i', $output, $matches);

    if (empty($matches)) {
      $output = 'Details';
    }
    else {
      $output = $matches[1];
    }

    print '<a href="#block-views-b827d9a12ccb67338ca3e3057b297ee0">' . $output . ' &hellip;</a>';
  }
?>
