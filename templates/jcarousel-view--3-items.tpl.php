<?php

/**
 * @file jcarousel-view--3-items.tpl.php
 */
?>
<div class="container">
  <div class="slider-wrapper" data-autoplay="false">
    <div class="item-carousel-3-view owl-carousel owl-theme">
      <?php foreach ($rows as $id => $row): ?>
        <div class="<?php print $row_classes[$id]; ?>">
          <?php print $row; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
