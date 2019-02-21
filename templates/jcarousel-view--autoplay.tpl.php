<?php

/**
 * @file jcarousel-view--autoplay.tpl.php
 */
?>
<div class="slider-wrapper" data-autoplay="6000">
  <div class="fullwidth-slider-view owl-carousel owl-theme">
    <?php foreach ($rows as $id => $row): ?>
      <div class="<?php print $row_classes[$id]; ?>">
        <?php print $row; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
