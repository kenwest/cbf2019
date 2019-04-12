<?php

/**
 *
 */

  $months = [];

  foreach ($rows as $id => $row) {
    if (
      preg_match(
        '/>([0-9]+)</i',
        $row,
        $matches
      ) == 1) {
      $startTimestamp = $matches[1];
      $startDate = new DateObject(intval($startTimestamp), 'Australia/Sydney');
      $monthNumber = $startDate->format('Y-m');
      $monthName = $startDate->format('F');
      $dayNumber = $startDate->format('j');

      if (!isset($months[$monthNumber])) {
        if (count($months) == 3) {
          break;
        }
        $months[$monthNumber] = [
          'month' => $monthName,
          'key dates' => [],
        ];
      }

      $months[$monthNumber]['key dates'][] = [
        'classes' => $classes_array[$id] ? ' class="row ' . $classes_array[$id] . '"' : ' class="row"',
        'row' => str_replace($startTimestamp, $dayNumber, $row),
      ];
    }
  }
?>

<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>

<?php
  print '<div class="row">';
  foreach ($months as $month) {
    print '<div class="col-xs-12 col-sm-4">';
    print   '<div class="row">';
    print     '<div class="col-xs-12 key-dates-month">';
    print       $month['month'];
    print     '</div>';
    print   '</div>';
    foreach ($month['key dates'] as $keyDate) {
      print '<div ' . $keyDate['classes'] . '>';
      print   $keyDate['row'];
      print '</div>';
    }
    print '</div>';
  }
  print '</div>';
  