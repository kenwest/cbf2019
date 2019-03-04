<?php

/**
 * @file jcarousel-view--4-items.tpl.php
 */
?>
<div class="container">
  <div class="slider-wrapper" data-autoplay="false" data-scrollperpage="true">
    <div class="item-carousel-4-view owl-carousel owl-theme">
      <?php foreach ($rows as $id => $row): ?>
        <div class="<?php print $row_classes[$id]; ?>">
          <?php print $row; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
