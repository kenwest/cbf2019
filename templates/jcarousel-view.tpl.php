<?php

/**
 * @file jcarousel-view.tpl.php
 *
 * View template to display a list as an OWL carousel.
 *
 * @TODO: Develop OWL carousel as a style plugin of its own. Don't
 * need the full-blown Drupal OWL Carousel module as all the JS etc
 * is dupplied by the Rhythm theme.
 */
?>
<div class="slider-wrapper" data-autoplay="false">
  <div class="fullwidth-slider-view owl-carousel owl-theme">
    <?php foreach ($rows as $id => $row): ?>
      <div class="<?php print $row_classes[$id]; ?>">
        <?php print $row; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
