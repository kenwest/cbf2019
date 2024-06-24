<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>
<div class="view-content">
  <dt>
    <a href="#">
      <?php print $title; ?>
    </a>
  </dt>
  <dd style="display: block;">
    <?php foreach ($rows as $id => $row): ?>
      <div class="clearfix <?php print $classes_array[$id]; ?>"><?php print $row; ?></div>
    <?php endforeach; ?>
  </dd>
</div>
