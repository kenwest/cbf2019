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
  $modifiedOutput = preg_replace('/###/i', '<object data="', $output, 1);
  $modifiedOutput = preg_replace('/###/i', '" type="image/svg+xml"></object>', $modifiedOutput, 1);
  if (!empty($modifiedOutput)) {
    $output = $modifiedOutput;
  }
  print $output;
?>
