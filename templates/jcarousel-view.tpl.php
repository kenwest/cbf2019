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
<div class="slider-wrapper" data-autoplay="6000">
  <div class="fullwidth-slider owl-carousel owl-theme">
    <?php foreach ($rows as $id => $row): ?>
      <div class="<?php print $row_classes[$id]; ?> container">
        <div class="row">
          <?php print $row; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
