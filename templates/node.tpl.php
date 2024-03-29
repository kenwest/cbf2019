<?php

/**
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if ($teaser): ?>
    <h2 class="title" <?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <?php
    // Hide fields not used in this theme - may eventually be removed
    hide($content['field_add_to_calendar']);
    hide($content['field_image']);

    // Hide fields that are either displayed in views or are hidden by default
    // (and displayed via content-type specific templates)
    hide($content['field_in_activity']);
    hide($content['field_highlight']);
    hide($content['field_highlight_video']);
    hide($content['field_details']);
    hide($content['field_speakers']);

    // If there is $typeSpecific material, display it
    if (!empty($typeSpecific)) {
      print $typeSpecific;
    }
  ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      if ($addArticleSidebar ?? false) {
    ?>
        <div class="row">
          <div class="col-xs-12 col-md-9 col-md-push-3 col-lg-8 col-lg-push-4">
    <?php
      }

      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);

      if ($addArticleSidebar ?? false) {
    ?>
          </div>
          <div class="col-xs-12 col-md-3 col-md-pull-9 col-lg-pull-8">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-12">
    <?php
        print views_embed_view('cbf2019_article_topics', 'block_2'); // Article topic hierarchy
    ?>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-12">
    <?php
        /*
         * Find the Contributors block for this Domain and render it
         */
        $currentDomainId = domain_get_domain()['domain_id'];
        $christianDomainId = domain_load_domain_id('christian');
        if ($currentDomainId == $christianDomainId) {
          $contributorBlockInfo = 'Contributors for City Bible Forum';
        }
        else {
          $contributorBlockInfo = 'Contributors for Third Space';
        }
        $blocks_info = block_block_info();
        foreach ($blocks_info as $bid => $block_info) {
          if ($block_info['info'] == $contributorBlockInfo) {
            /*
             * Render the block
             * See https://www.drupal.org/project/drupal/issues/957038#comment-12723048
             */
            $block_object = block_load('block', $bid);
            $block_element = _block_get_renderable_array(_block_render_blocks([$block_object]));
            $block_output = drupal_render($block_element);
            print $block_output;
            break;
          }
        }
    ?>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
    <?php
        print views_embed_view('cbf2019_rated_content', 'block_2'); // More on Topic
    ?>
          </div>
        </div>
    <?php
      }
    ?>
  </div>

  <?php
    if (empty($suppressLinks)) {
      print render($content['links']);
    }
  ?>

  <?php print render($content['comments']); ?>

</div>
