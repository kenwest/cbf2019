<?php

/**
 * @file
 * A basic template for civiimport entities
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The name of the civiimport
 * - $url: The standard URL for viewing a civiimport entity
 * - $page: TRUE if this is the main view page $url points too.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-profile
 *   - civiimport-{TYPE}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>
<div class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
    <?php
      /*
       * Only print the properties we want. We can't rely on the Full display
       * setting because different themes show different properties. And this
       * approach is easier that creating new entity displays (CiviCRM Events
       * have 80 properties ;-)
       */
      $propertyList = [
        'description' => [
          '#access' => true,
          '#label_hidden' => true,
        ],
        'field_attachment' => [
          '#access' => true,
          '#label_hidden' => true,
        ],
        'field_staff_contact' => [
          '#access' => true,
        ],
        'field_addthis' => [
          '#access' => true,
        ],
      ];
      foreach ($propertyList as $propertyName => $propertySettings) {
        foreach ($propertySettings as $propertyKey => $propertyValue) {
          $content[$propertyName][$propertyKey] = $propertyValue;
        }
        print render($content[$propertyName]);
      }
    ?>
  </div>
</div>
