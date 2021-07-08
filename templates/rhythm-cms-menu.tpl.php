<!-- Navigation panel -->
<nav class="main-nav <?php print $color; ?> <?php print $transparent ? 'transparent stick-fixed' : 'js-stick'; ?>">
  <div class="full-wrapper relative clearfix">
    <!-- Logo ( * your text or image into link tag *) -->
    <?php if($logo): ?>
      <div class="nav-logo-wrap local-scroll">
        <a href="<?php print url('<front>'); ?>" class="logo">
          <?php
            if ($transparent && $color == 'dark') {
              $logo = str_replace('logo', 'logo-white', $logo);
            }
          ?>
          <object data="<?php print $logo; ?>" type="image/svg+xml">
            <img
              src="<?php print str_replace('.svg', '.png', $logo); ?>"
              alt="<?php print variable_get('site_name', ''); ?>"
              title = "<?php print variable_get('site_name', ''); ?>" />
          </object>
        </a>
      </div>
    <?php endif; ?>
    <div class="mobile-nav">
        <i class="fal fa-bars"></i>
    </div>

    <!-- Main Menu -->
    <div class="inner-nav desktop-nav">
      <ul class="clearlist">
        <?php if (module_exists('tb_megamenu')) {
            print theme('tb_megamenu', array('menu_name' => $menu));
          }
          else {
            $main_menu_tree = module_exists('i18n_menu') ? i18n_menu_translated_tree($menu) : menu_tree($menu);
            print drupal_render($main_menu_tree);
          }
        ?>
        <?php if (isset($search) && $search || $language || isset($cart) && $cart) : ?>
          <li><a style="height: 75px; line-height: 75px;">&nbsp;</a></li>
        <?php endif; ?>
        <?php if (isset($search) && $search && module_exists('search')): ?>
          <li class="search-dropdown-list">
            <a href="#" class="mn-has-sub" style="height: 75px; line-height: 75px;"><i class="fal fa-search"></i> <?php print t('Search'); ?></a>
            <ul class="mn-sub" style="display: none;">
              <li>
                <div class="mn-wrap">
                  <?php
                    if(module_exists('search')) {
                      $search_form_box = module_invoke('search', 'block_view');
                      print render($search_form_box);
                    }
                  ?>
                </div>
              </li>
            </ul>
          </li>
        <?php endif; ?>
        <?php
          $domainName = domain_get_domain()['machine_name'];
          switch ($domainName) {
            case 'christian':
              $extraMenuClass = 'give-menu-item';
              $extraMenuUrl = '/donate';
              $extraMenuText = 'Give';
              break;
            case 'general':
              $extraMenuClass = 'call-menu-item';
              $extraMenuUrl = '/city/webform/bible-reading';
              $extraMenuText = 'Schedule a call';
              break;
          }
        ?>
        <?php if (isset($extraMenuClass)): ?>
          <li class="<?php print $extraMenuClass; ?>">
            <a href="<?php print $extraMenuUrl; ?>" style="height: 75px; line-height: 75px;"><?php print $extraMenuText; ?></a>
          </li>
        <?php endif; ?>
        <?php if (isset($cart) && $cart && module_exists('commerce_cart')): ?>
          <li>
            <a href="<?php print url('cart'); ?>" style="height: 75px; line-height: 75px;"><i class="fal fa-shopping-cart"></i> <?php print t('Cart') . '(' . _rhythm_cart_count() . ')'; ?></a>
          </li>
        <?php endif; ?>
        <?php if ($language && module_exists('locale') && drupal_multilingual()):
          global $language;
        ?>
          <li>
            <a href="#" style="height: 75px; line-height: 75px;" class = "mn-has-sub"><?php print $language->language; ?> <i class="fal fa-angle-down"></i></a>
              <?php
                $path = drupal_is_front_page() ? '<front>' : $_GET['q'];
                $links = language_negotiation_get_switch_links('language', $path);
                if(isset($links->links)) {
                  $variables = array('links' => $links->links, 'attributes' => array('class' => array('mn-sub')));
                  print theme('links__locale_block', $variables);
                }
              ?>
          </li>
        <?php endif; ?>
      </ul>
    </div>
    <!-- End Main Menu -->
  </div>
</nav>
