<?php

/**
 * @file jcarousel-view--autoplay.tpl.php
 */
?>
<div class="slider-wrapper" data-autoplay="6000">
  <div class="fullwidth-slider-view owl-carousel owl-theme">
    <?php
      cbf_is_views_content_unique(false);
      foreach ($rows as $id => $row) {
        if (cbf_is_views_content_unique($row)) {
    ?>
      <div class="<?php print $row_classes[$id]; ?>">
        <?php print $row; ?>
      </div>
    <?php
        }
      }
    ?>
  </div>
</div>
