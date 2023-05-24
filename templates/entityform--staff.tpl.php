<?php

/**
 * @file
 * A basic template for entityform entities
 *
 * Available variables:
 * - $content: An array of field items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The name of the entityform
 * - $url: The standard URL for viewing a entityform entity
 * - $page: TRUE if this is the main view page $url points too.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-profile
 *   - entityform-{TYPE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */

if ($field_enquiry_form[0]['taxonomy_term']->description ?? '') {
  $url = $field_enquiry_form[0]['taxonomy_term']->description;
}
else if ($field_staff_contact[0]['contact_id'] ?? '') {
  $url = "/staff-contact?cid1={$field_staff_contact[0]['contact_id']}";
}

?>
<?php if (!$page) { ?>
      <?php if (!empty($url)) { ?>
        <a href="<?php print $url; ?>"><?php print $title; ?></a>
      <?php } else { ?>
        <?php print $title; ?>
      <?php } ?>
<?php } else { ?>
  <div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <h2<?php print $title_attributes; ?>>
      <?php if (!empty($url)) { ?>
        <a href="<?php print $url; ?>"><?php print $title; ?></a>
      <?php } else { ?>
        <?php print $title; ?>
      <?php } ?>
    </h2>

    <div class="content"<?php print $content_attributes; ?>>
      <?php
        print render($content);
      ?>
    </div>
  </div>
<?php } ?>
