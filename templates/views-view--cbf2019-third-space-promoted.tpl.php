<?php

/**
 * @file
 * Main view template.
 *
 * Variables available:
 * - $classes_array: An array of classes determined in
 *   template_preprocess_views_view(). Default classes are:
 *     .view
 *     .view-[css_name]
 *     .view-id-[view_name]
 *     .view-display-id-[display_name]
 *     .view-dom-id-[dom_id]
 * - $classes: A string version of $classes_array for use in the class attribute
 * - $css_name: A css-safe version of the view name.
 * - $css_class: The user-specified classes names, if any
 * - $header: The view header
 * - $footer: The view footer
 * - $rows: The results of the view query, if any
 * - $empty: The empty text to display if the view is empty
 * - $pager: The pager next/prev links to display, if any
 * - $exposed: Exposed widget form/info to display
 * - $feed_icon: Feed icon to display, if any
 * - $more: A link to view more, if any
 *
 * @ingroup views_templates
 */
?>

<div class="slider-wrapper" style="text-shadow: 0 0 40px black;" data-autoplay = "8000">
  <div class="fullwidth-slider owl-carousel bg-gray owl-theme" style="opacity: 1; display: block;">

  <?php
    /*
     * Add a fixed slider item for the Panic room.
     */
  ?>

    <div>
      <section class="page-section bg-scroll banner-section pt-0 pb-0" style="border-width: 0px; background-image: url('/sites/default/files/images/national/2020/panic-room-slider.jpg');">
        <div class="js-height-full">
          <div class = "home-content">
            <div class="home-text">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12 white">
                    <i class="fa fal fa-ambulance" style="font-size: 50px;"></i>
                    <h2 class="font-alt uppercase ls-01 hs-line-14" style="margin-top: 20px; margin-bottom: 20px; font-size: 32px; letter-spacing: 0.1em;">
                      Panic room - COVID-19
                    </h2>
                    <h3 class="font-alt uppercase" style="margin-top: 20px; margin-bottom: 20px;">
                      8 to 10 minutes of pure panic to help you through the day
                    </h3>
                    <a class="btn btn-mod btn-border-w btn-large btn-round uppercase" style="font-size: 24px;" href="/third-space/category/1636">
                      Panic!
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php
      $thirdSpaceTitle = null;

      foreach ($view->result as $result) {
        if (
          empty($result->field_field_title_image) ||
          empty($result->field_field_second_title) ||
          empty($result->node_title) ||
          empty($result->field_field_subtitle) ||
          empty($result->field_field_resource_type) ||
          empty($result->field_field_second_title))
        {
          continue;
        }

        $thirdSpaceImage = str_ireplace(
          'public://',
          '/sites/default/files/',
          $result->field_field_title_image[0]['rendered']['#item']['uri']);
        $thirdSpaceIcon = $result->field_field_second_title[0]['rendered']['#markup'];
        $thirdSpaceTitle = htmlspecialchars($result->node_title, ENT_QUOTES);
        $thirdSpaceSubtitle = $result->field_field_subtitle[0]['rendered']['#markup'];
        $thirdSpaceAction = $result->field_field_resource_type[0]['rendered']['#markup'];
        if (strpos($thirdSpaceAction, 'fa-video') !== false) {
          $thirdSpaceAction = 'Watch';
        }
        else if (strpos($thirdSpaceAction, 'fa-microphone') !== false) {
          $thirdSpaceAction = 'Listen';
        }
        else {
          $thirdSpaceAction = 'Read';
        }
    ?>

    <div>
      <section class="page-section bg-scroll banner-section pt-0 pb-0" style="border-width: 0px; background-image: url('<?php print $thirdSpaceImage; ?>');">
        <div class="js-height-full">
          <div class = "home-content">
            <div class="home-text">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12 white">
                    <i class="<?php print $thirdSpaceIcon; ?>" style="font-size: 50px;"></i>
                    <h2 class="font-alt uppercase ls-01 hs-line-14" style="margin-top: 20px; margin-bottom: 20px; font-size: 32px; letter-spacing: 0.1em;">
                      <?php print $thirdSpaceTitle; ?>
                    </h2>
                    <h3 class="font-alt uppercase" style="margin-top: 20px; margin-bottom: 20px;">
                      <?php print $thirdSpaceSubtitle; ?>
                    </h3>
                    <a class="btn btn-mod btn-border-w btn-large btn-round uppercase" style="font-size: 24px;" href="/node/<?php print $result->nid; ?>">
                      <?php print $thirdSpaceAction; ?>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

  <?php
    }

    /*
     * If none of the nodes could be displayed, then we need to show something.
     * An oldie but a goldie.
     */
    if (empty($thirdSpaceTitle)) {
  ?>

    <div>
      <section class="page-section bg-scroll banner-section pt-0 pb-0" style="border-width: 0px; background-image: url('https://thirdspace.org.au/sites/default/files/images/content/2020/David%20TS%20Banner%20Image.png');" data-background="https://thirdspace.org.au/sites/default/files/images/content/2020/David%20TS%20Banner%20Image.png" data-uri="public://images/content/2020/David TS Banner Image.png">
        <div class="js-height-full">
          <div class = "home-content">
            <div class="home-text">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12 white">
                    <i class="fal fa-landmark" style="font-size: 50px;"></i>
                    <h2 class="font-alt uppercase ls-01 hs-line-14" style="margin-top: 20px; margin-bottom: 20px; font-size: 32px; letter-spacing: 0.1em;">What is the good society?</h2>
                    <h3 class="font-alt uppercase " style="margin-top: 20px; margin-bottom: 20px;">It's the age of dystopia on TV</h3>
                    <a class="btn btn-mod btn-border-w btn-large btn-round uppercase" style="font-size: 24px;" href="/city/episode/good-society">Watch</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <?php
      }
    ?>

  </div>
</div>
