<?php if(request_uri() == '/maintenance' && strpos($_SERVER['HTTP_HOST'], 'nikadevs') !== FALSE) { include('maintenance-page.tpl.php'); exit(); } ?>

<!DOCTYPE html>
<html  lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
  <?php print $head; ?>

  <title><?php print $head_title; ?></title>
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name=viewport content="width=device-width, initial-scale=1">

  <?php print $styles; ?>
  <?php if (stripos($_SERVER['HTTP_HOST'], "nikadevs") !== FALSE && module_exists('nikadevs_dev')) include DRUPAL_ROOT . '/' . drupal_get_path('module', 'nikadevs_dev') . '/g_analytics/rhythm.js'; ?>
</head>
<body class="appear-animate <?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="main-wrap">
    <?php if(theme_get_setting('loader_image')): ?>
      <!-- Page Loader -->
      <div class="page-loader">
          <div class="loader"><?php print t('Loading...'); ?></div>
      </div>
      <!-- End Page Loader -->
    <?php endif; ?>

    <?php print $page_top; ?>
    <?php
      $fragments = preg_split('|(</?script[^>]*>)|i', $page, -1, PREG_SPLIT_DELIM_CAPTURE);
      for ($i = 0; $i < count($fragments); $i += 4) {
        print $fragments[$i];
      }
      print $scripts;
      for ($i = 1; $i < count($fragments); $i++) {
        if ($i % 4 != 0) {
          print $fragments[$i];
        }
      }
    ?>
    <script src="//maps.googleapis.com/maps/api/js?key=<?php print theme_get_setting('gmap_key'); ?>" type="text/javascript"></script>
    <!--[if lt IE 10]><script type="text/javascript" src="<?php print base_path() . drupal_get_path('theme', 'rhythm'); ?>/js/placeholder.js"></script><![endif]-->
    <?php print $page_bottom; ?>
  </div>
</body>
</html>