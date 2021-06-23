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
      $sliderTitle = null;

      foreach ($view->result as $result) {
        if (
          empty($result->field_field_title_image) ||
          empty($result->field_field_title) ||
          empty($result->field_field_subtitle) ||
          empty($result->field_field_order_url))
        {
          continue;
        }

        $sliderImage = image_style_url(
          $result->field_field_title_image[0]['rendered']['#image_style'],
          $result->field_field_title_image[0]['rendered']['#item']['uri']);
        $sliderTitle = $result->field_field_title[0]['rendered']['#markup'];
        $sliderSubtitle = $result->field_field_subtitle[0]['rendered']['#markup'];
        $sliderLinkURL = $result->field_field_order_url[0]['raw']['url'];
        $sliderLinkTitle = $result->field_field_order_url[0]['raw']['title'];
    ?>

    <div>
      <section class="page-section bg-scroll banner-section pt-0 pb-0" style="border-width: 0px; background-image: url('<?php print $sliderImage; ?>');">
        <div class="js-height-full">
          <div class="home-content">
            <div class="home-text">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12 white">
                    <h4 class="font-alt hs-line-8">
                      <?php print $sliderSubtitle; ?>
                    </h4>
                    <h2 class="font-alt hs-line-14" style="margin-top: 50px; margin-bottom: 50px;">
                      <?php print $sliderTitle; ?>
                    </h2>
                    <a class="btn btn-mod btn-border-w btn-medium btn-round" style="margin-right: 8px;" href="<?php print $sliderLinkURL; ?>">
                      <?php print $sliderLinkTitle; ?>
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
    if (empty($sliderTitle)) {
  ?>

    <div>
      <section class="page-section bg-scroll banner-section pt-0 pb-0" style="border-width: 0px; background-image: url('https://citybibleforum.org/sites/default/files/images/content/2020/CL%20Banner%20Image_0.png');" data-background="https://citybibleforum.org/sites/default/files/images/content/2020/CL%20Banner%20Image_0.png" data-uri="public://images/content/2020/CL Banner Image_0.png">
        <div class="js-height-full">
          <div class="home-content">
            <div class="home-text">
              <div class="container">
                <div class="row">
                  <div class="col-xs-12 white">
                    <h4 class="font-alt white hs-line-8">Michael Kellahan at City Legal</h4>
                    <h2 class="font-alt white hs-line-14" style="margin-top: 50px; margin-bottom: 50px;">What is the good society?</h2>
                    <a class="btn btn-mod btn-border-w btn-medium btn-round" style="margin-right: 8px;" href="/city/sydney/episode/freedom%E2%80%A6-worship">Listen now</a>
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
<div class="local-scroll">
  <a href="#scroll-home-page-slider" class="scroll-down">
    <i class="fal fa-angle-down scroll-down-icon"></i>
  </a>
</div>
<span id="scroll-home-page-slider"></span>
