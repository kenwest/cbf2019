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
<div class="<?php print $classes; ?>">
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($header && $more): ?>
    <div class="container">
      <div class="row view-header-and-more">
        <div class="col-xs-8">
          <div class="view-header h4 align-left font-alt uppercase primary-colour bold">
            <?php print $header; ?>
          </div>
        </div>
        <div class="col-xs-4">
          <div class="h4 align-right uppercase">
            <?php print $more; ?>
          </div>
        </div>
      </div>
    </div>
  <?php elseif ($header): ?>
    <div class="container">
      <div class="row view-header-and-more">
        <div class="col-xs-12">
          <div class="view-header h4 align-center font-alt uppercase primary-colour bold">
            <?php print $header; ?>
          </div>
        </div>
      </div>
    </div>
  <?php elseif ($more): ?>
    <div class="container">
      <div class="row view-header-and-more">
        <div class="col-xs-12">
          <div class="h4 align-right uppercase">
            <?php print $more; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print preg_replace('!(<a) ([^>]*href=)!i', '$1 rel="nofollow" $2', $exposed); ?>
    </div>
  <?php endif; ?>
  
  <div class="clearfix"></div>
  
  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>

  <?php if ($rows): ?>
    <div class="view-content">
      <dl class="accordion">
        <?php print $rows; ?>
      </dl>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>

  <?php if ($pager): ?>
    <?php print preg_replace('!(<a) ([^>]*href=)!i', '$1 rel="nofollow" $2', $pager); ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>

</div><?php /* class view */ ?>
