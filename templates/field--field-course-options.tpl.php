<?php

/**
 * Available variables:
 * - $items: An array of field values. Use render() to output them.
 * - $label: The item label.
 * - $label_hidden: Whether the label display is set to 'hidden'.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - field: The current template type, i.e., "theming hook".
 *   - field-name-[field_name]: The current field name. For example, if the
 *     field name is "field_description" it would result in
 *     "field-name-field-description".
 *   - field-type-[field_type]: The current field type. For example, if the
 *     field type is "text" it would result in "field-type-text".
 *   - field-label-[label_display]: The current label position. For example, if
 *     the label position is "above" it would result in "field-label-above".
 *
 * Other variables:
 * - $element['#object']: The entity to which the field is attached.
 * - $element['#view_mode']: View mode, e.g. 'full', 'teaser'...
 * - $element['#field_name']: The field name.
 * - $element['#field_type']: The field type.
 * - $element['#field_language']: The field language.
 * - $element['#field_translatable']: Whether the field is translatable or not.
 * - $element['#label_display']: Position of label display, inline, above, or
 *   hidden.
 * - $field_name_css: The css-compatible field name.
 * - $field_type_css: The css-compatible field type.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_field()
 * @see theme_field()
 *
 * @ingroup themeable
 */
?>
<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if (!$label_hidden): ?>
    <div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
  <?php endif; ?>
  <?php
    $options = [
      'full-course' => [
        'available' => false,
        'multiple' => false,
        'css-class' => '',
        'title' => 'Full course',
        'text' => 'Enrol in the @sessions course for @price. You will have access for @expiry.',
        'args' => [],
      ],
      'trial-license' => [
        'available' => false,
        'css-class' => '',
        'title' => 'Free trial',
        'text' => 'Enrol in the trial version for @expiry of free access to @sessions.',
        'args' => [],
      ],
      'group-license' => [
        'available' => false,
        'css-class' => '',
        'title' => 'Group licence',
        'text' => 'Enrolling in a group licence will allow you to deliver the course in-person at a discount. The licence will provide you with a facilitator\'s login for the course with access for @expiry. Also, members of your group will have the ability to access the course materials under the group licence from their own device during this period.',
        'args' => [],
      ],
    ];
    foreach ($items as $_ => $item) {
      $courseOption = reset($item['entity']['paragraphs_item']);

      $price = cbf_field_get_items('paragraphs_item', $courseOption['#entity'], 'field_training_option_price', 'amount', false);
      $group = cbf_field_get_items('paragraphs_item', $courseOption['#entity'], 'field_group_license_count', 'value', false);

      if (
        $group
        && !$options['group-license']['available']
        && $options['full-course']['available']
      ) {
        $options['group-license']['available'] = true;
        $options['group-license']['args']['@expiry'] =
          $courseOption['field_thinkific_expiry_period'][0]['#markup']
          ?? $options['full-course']['args']['@expiry'];
      }
      else if (!$options['full-course']['available']) {
        $options['full-course']['available'] = true;
        if ($courseOption['field_training_option_sessions'][0]['#markup']) {
          $options['full-course']['args']['@sessions'] = 'full ' .
            $courseOption['field_training_option_sessions'][0]['#markup'] . ' sessions';
        }
        else {
          $options['full-course']['args']['@sessions'] = 'full';
        }
        $options['full-course']['args']['@price'] =
          $courseOption['field_training_option_price'][0]['#markup'];
        $options['full-course']['args']['@expiry'] =
          $courseOption['field_thinkific_expiry_period'][0]['#markup'];
      }
      else if (
        is_numeric($price)
        && !$price
        && !$group
        && !$options['trial-license']['available']
        && $options['full-course']['available']
      ) {
        $options['trial-license']['available'] = true;
        if ($courseOption['field_training_option_sessions'][0]['#markup']) {
          $options['trial-license']['args']['@sessions'] = 'the first ' .
            $courseOption['field_training_option_sessions'][0]['#markup'] . ' sessions';
        }
        else {
          $options['trial-license']['args']['@sessions'] = 'a cut-down version of the course';
        }
        $options['trial-license']['args']['@expiry'] =
          $courseOption['field_thinkific_expiry_period'][0]['#markup'];
      }
      else if (
        (!is_numeric($price) || $price) // Not a zero price
        && !$group
        && $options['full-course']['available']
        && !$options['full-course']['multiple']
      ) {
        $options['full-course']['multiple'] = true;
      }
    }

    /*
     * If there are multiple full-course options then displaying the field-items
     * is meaningless as they will potentially have different prices and expiry
     * periods and sessions. Display nothing and leave it to the course author
     * to explain the options in the Body.
     */
    if (!$options['full-course']['multiple']) {
      if ($options['full-course']['available']) {
        if ($options['trial-license']['available']) {
          $options['full-course']['css-class'] =
          $options['trial-license']['css-class'] = 'short';
        }
        else if (!$options['group-license']['available']) {
          // Only the full-course is available so writing 'full course' is meaningless
          $options['full-course']['title'] = 'When you enrol';
          $options['full-course']['text'] = 'You will be charged @price and have access for @expiry.';
        }
      }
  ?>
  <div class="field-items"<?php print $content_attributes; ?>>
    <?php
      $delta = 0;
      foreach ($options as $license => $option) {
        if ($option['available']) {
     ?>
        <div class="field-item <?php print "$license {$option['css-class']}" . (($delta % 2) ? ' odd' : ' even'); ?>"<?php print $item_attributes[$delta]; ?>>
          <?php
            $description = format_string(
              $option['text'],
              $option['args']);
            print format_string(
              '<p class="bold uppercase">@name</p><p>!description</p>',
              [
                '@name' => $option['title'],
                '!description' => $description,
              ]);
          ?>
        </div>
    <?php
        }
        $delta++;
      }
    ?>
  </div>
  <?php
    }
  ?>
</div>
