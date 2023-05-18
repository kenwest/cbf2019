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

  foreach ($items as $_ => $item) {
    $hubspotForm = reset($item['entity']['paragraphs_item']);

    $formType = cbf_field_get_items('paragraphs_item', $hubspotForm['#entity'], 'field_hubspot_form_type', 'tid', false);
    $formId = cbf_field_get_items('paragraphs_item', $hubspotForm['#entity'], 'field_title', 'value', false);
  }

  $formType = taxonomy_term_load($formType);
  $formType = $formType->name;

  switch ($formType) {

    case 'HubSpot':
      $portalId = variable_get('hubspot_portal_id');
      cbf_hubspot_script_cache(
        "<script charset='utf-8' type='text/javascript' src='//js.hsforms.net/forms/embed/v2.js'></script>
        <script>
          hbspt.forms.create({
            region: 'na1',
            portalId: '$portalId',
            formId: '$formId'
          });
        </script>");
      break;

    case 'DepositFix':
      $portalId = variable_get('depositfix_portal_id');
      cbf_hubspot_script_cache(
        "<script id='df-widget-js' src='https://widgets.depositfix.com/v1/app.min.js?v2'></script>
        <script id='df-script' type='text/javascript'>
          DepositFixForm.init({
            portalId: '$portalId',
            formId: '$formId'
          });
        </script>");
      break;

    default:
      break;
  }
?>

<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php if (!$label_hidden) { ?>
  <div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
  <?php } ?>
  <div class="field-items"<?php print $content_attributes; ?>>
    <?php foreach ($items as $delta => $item) { ?>
    <div class="field-item <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>>
      <cbf-hubspot-script/>
    </div>
    <?php
            break; /* Only one HubSpot script */
          }
    ?>
  </div>
</div>
