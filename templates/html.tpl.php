<?php if(request_uri() == '/maintenance' && strpos($_SERVER['HTTP_HOST'], 'nikadevs') !== FALSE) { include('maintenance-page.tpl.php'); exit(); } ?>

<!DOCTYPE html>
<html  lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
  <?php print $head; ?>

  <title><?php print $head_title; ?></title>
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name=viewport content="width=device-width, initial-scale=1">

  <?php
    $domainName = domain_get_domain()['machine_name'];
    $primaryColour = ($domainName == 'christian') ? '#1c9cd6' : '#cf2e4f';
  ?>

  <link rel="apple-touch-icon" sizes="180x180" href="/sites/all/themes/cbf2019/images/<?php print $domainName; ?>/brand/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/sites/all/themes/cbf2019/images/<?php print $domainName; ?>/brand/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/sites/all/themes/cbf2019/images/<?php print $domainName; ?>/brand/favicon-16x16.png">
  <link rel="manifest" href="/sites/all/themes/cbf2019/images/<?php print $domainName; ?>/brand/site.webmanifest">
  <link rel="mask-icon" href="/sites/all/themes/cbf2019/images/<?php print $domainName; ?>/brand/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="shortcut icon" href="/sites/all/themes/cbf2019/images/<?php print $domainName; ?>/brand/favicon.ico">
  <meta name="msapplication-TileColor" content="#000000">
  <meta name="msapplication-config" content="/sites/all/themes/cbf2019/images/<?php print $domainName; ?>/brand/browserconfig.xml">
  <meta name="theme-color" content="<?php print $primaryColour; ?>">
  <meta name="apple-mobile-web-app-status-bar-style" content="<?php print $primaryColour; ?>">

  <?php print $styles; ?>
  <?php if (stripos($_SERVER['HTTP_HOST'], "nikadevs") !== FALSE && module_exists('nikadevs_dev')) include DRUPAL_ROOT . '/' . drupal_get_path('module', 'nikadevs_dev') . '/g_analytics/rhythm.js'; ?>
</head>
<body class="appear-animate <?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print $page_top; ?>

  <div class="main-wrap">
    <?php if(theme_get_setting('loader_image')): ?>
      <!-- Page Loader -->
      <div class="page-loader">
          <div class="loader"><?php print t('Loading...'); ?></div>
      </div>
      <!-- End Page Loader -->
    <?php endif; ?>

    <?php
      if (drupal_is_front_page()) {
        /*
         * On drupal_is_front_page() views may refer to the home page using variable 'site_frontpage'.
         * Remove this as it confuses SEO.
         */
        $site_frontpage = variable_get('site_frontpage', 'node');
        $page = preg_replace('!( href="https://[a-z.]+/)' . $site_frontpage . '(["?])!i', '$1$2', $page);
      }
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
