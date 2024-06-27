<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div class="view-content">
<?php if (!empty($title)): ?>
  <p class="h3"><?php print $title; ?></p>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <div class="views-embedded<?php if ($classes_array[$id]): print ' ' . $classes_array[$id]; endif; ?>">
    <?php print $row; ?>
  </div>
<?php endforeach; ?>
</div>
