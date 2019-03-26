<?php

/**
 * @file jcarousel-view--fieldwise.tpl.php
 */
?>
<div class="slider-wrapper" data-autoplay="false">
  <div class="fullwidth-slider-view owl-carousel owl-theme">
    <?php foreach ($rows as $id => $row): ?>
      <?php print $row; ?>
    <?php endforeach; ?>
  </div>
</div>
