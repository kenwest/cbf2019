<?php

/**
 * @file
 * View template to display a list of rows for Article Topics.
 * Suppress the list if this group is not the 'focus'
 * Add a link to the $title
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */

  $focus = cbf_convert_article_topics_to_focus();
  $firstRow = reset($rows) ?? '';
  $matches = [];
  preg_match('/focus=([a-z0-9-]+)/i', $firstRow, $matches);
  $titleParam = $matches[1] ?? '';
  $showList = false;

  print $wrapper_prefix;
  if (!empty($title)) {
    if (!empty($titleParam)) {
      $articleLink = "/resources?topic={$titleParam}&focus={$titleParam}#featured";
      if ($focus == $titleParam) {
        $showList = true;
      }
    }
    else {
      $articleLink = "/resources";
    }
?>
    <div><a href="<?php print $articleLink; ?>"><?php print $title; ?></a></div>
<?php
  }
  if ($showList) {
    print $list_type_prefix;
    foreach ($rows as $id => $row) {
?>
      <li class="<?php print $classes_array[$id]; ?>"><?php print $row; ?></li>
<?php
    }
    print $list_type_suffix;
  }
  print $wrapper_suffix;
?>
