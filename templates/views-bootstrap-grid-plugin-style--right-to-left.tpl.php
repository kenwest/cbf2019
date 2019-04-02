<?php
/**
 *
 * This variant of views-bootstrap-grid-plugin-style handles views that
 * are tagged as 'right-to-left' and have their content in reverse order.
 * This makes the most-recent content on the right, and the next page is
 * actually previous in time. If '0' is the most recent then layouts are ...
 *
 *   xs     sm        md and lg
 *   0      1   0     3   2   1   0
 *   1      3   2     7   6   5   4
 *   2      5   4
 *   3
 *
 * - $columns contains rows grouped by columns.
 * - $rows contains a nested array of rows. Each row contains an array of
 *   columns.
 * - $column_type contains a number (default Bootstrap grid system column type).
 * - $class_prefix defines the default prefix to use for column classes.
 */
?>

<?php if (!empty($title)): ?>
  <h3><?php print $title ?></h3>
<?php endif ?>

<div id="views-bootstrap-grid-<?php print $id ?>" class="<?php print $classes ?>">

  <?php
    $i = 0;
    foreach ($items as $row) {
      foreach ($row['content'] as $column) {
        switch ($i++ % 4) {
          case 0:
            $htmlBefore =
              '<div class="row">
                 <div class="col-xs-12 col-md-6 col-md-push-6">
                   <div class="row">
                     <div class="col-xs-12 col-sm-6 col-sm-push-6">';
            $htmlAfter = '</div>';
            break;

          case 1:
            $htmlBefore = '<div class="col-xs-12 col-sm-6 col-sm-pull-6">';
            $htmlAfter = '</div></div></div>';
            break;

          case 2:
            $htmlBefore =
              '<div class="col-xs-12 col-md-6 col-md-pull-6">
                 <div class="row">
                   <div class="col-xs-12 col-sm-6 col-sm-push-6">';
            $htmlAfter = '</div>';
            break;

          case 3:
            $htmlBefore = '<div class="col-xs-12 col-sm-6 col-sm-pull-6">';
            $htmlAfter = '</div></div></div></div>';
            break;    
        }
        print $htmlBefore;
        print $column['content'];
        print $htmlAfter;
      }
    }
    switch ($i % 4) {
      case 0:
        break;

      case 1:
      case 3:
        print '</div></div></div>';
        break;

      case 2:
        print '</div>';
        break;
    }
  ?>
</div>
