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
?>
<?php
  foreach ($fields as $id => $field) {
    /*
     * Separate out multiple instances of the field into separate 'rows' of the
     * view. This requires that the field can have multiple instances, the field
     * in the view has its Multiple Field Settings set to 'Display all values in
     * the same row' and the Display type is 'unordered list'.
     */
    $contentSplit = preg_split('!</?li( [^>]*)?>\s*!i', $field->content);
    if (count($contentSplit) == 1) {
      $contents = $contentSplit;
    }
    else {
      $contents = [];
      foreach ($contentSplit as $i => $v) {
        if ($i % 2 == 1) {
          $contents[] = '<div class="field-content">' . $v . '</div>';
        }
      }
    }

    foreach ($contents as $content) {
?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <?php
          if (!empty($field->separator)) {
            print $field->separator;
          }
          print $field->wrapper_prefix;
          print $field->label_html;
          print $content;
          print $field->wrapper_suffix;
        ?>
      </div>
    </div>
  </div>
<?php
    }
  }
?>
