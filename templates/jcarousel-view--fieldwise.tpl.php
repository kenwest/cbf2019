<?php

/**
 * @file jcarousel-view--fieldwise.tpl.php
 */
?>
<div class="slider-wrapper" data-autoplay="false">
  <div class="fullwidth-slider-view owl-carousel owl-theme">
    <?php
      cbf_is_views_field_cached(false);
      foreach ($rows as $id => $row) {
    ?>
      <?php print $row; ?>
    <?php } ?>
  </div>
</div>
