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
<div class="container">
  <div class="row">
    <div class="col-md-7">
      <?php $first_field = true; ?>
      <?php foreach ($fields as $id => $field): ?>
        <?php if (!empty($field->separator)): ?>
          <?php print $field->separator; ?>
        <?php endif; ?>
        <?php print $field->wrapper_prefix; ?>
        <?php print $field->label_html; ?>
        <?php if (empty($row->__cbf_merge_events)): ?>
          <?php print $field->content; ?>
        <?php else: ?>
          <?php print preg_replace('/href=\"([^"]+)\"/i', 'href="/' . $row->__cbf_merge_events . '"', $field->content); ?>
        <?php endif; ?>
        <?php print $field->wrapper_suffix; ?>
        <?php if ($first_field): ?>
    </div>
    <div class="col-md-5 col-lg-4 col-lg-offset-1">
          <?php $first_field = false; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>
