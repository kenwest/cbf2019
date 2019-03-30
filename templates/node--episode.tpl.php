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
    /*
     * Render field_order_url, field_attachment, field_video, and field_content
     * as a set of tabs.
     */
    $tabFields = [
      'field_order_url' => [
        'label' => 'Order hard copy',
        'weight' => 4,
      ],
      'field_attachment' => [
        'label' => 'Download PDF',
        'weight' => 3,
      ],
      'field_video' => [
        'label' => 'Play video',
        'weight' => 1,
      ],
      'field_content' => [
        'label' => 'Play audio',
        'weight' => 2,
      ],
    ];

    $tabActive = [
      'tab' => '',
      'weight' => 100
    ];

    foreach ($tabFields as $tabKey => $tabSettings) {
      if (isset($content[$tabKey])) {
        if ($tabSettings['weight'] < $tabActive['weight']) {
          $tabActive['tab'] = $tabKey;
          $tabActive['weight'] = $tabSettings['weight'];
        }
      }
    }

    if (!empty($tabActive['tab'])) {
      $tabContent = '';
      $tabPaneContent = '';

      foreach ($tabFields as $tabKey => $tabSettings) {
        if (isset($content[$tabKey])) {
          $tabActiveClass = ($tabActive['tab'] == $tabKey) ? ' class = "active"' : '';
          $tabExpanded = ($tabActive['tab'] == $tabKey) ? 'true' : 'false';
          $tabContent
            .= '<li'
            .  $tabActiveClass
            .  '><a data-toggle="tab" href="#tab-'
            .  $tabKey
            .  '" aria-expanded="'
            .  $tabExpanded
            .  '">'
            .  $tabSettings['label']
            .  '</a></li>';

          if ($tabKey == 'field_order_url') {
            $tabFieldContent = '';
            $orderUrlillustrations = [
              'field_highlight_video',
              'field_highlight',
            ];
            foreach ($orderUrlillustrations as $illustration) {
              if (!empty($content[$illustration])) {
                $tabFieldContent .= render($content[$illustration]);
                hide($content[$illustration]);
                break;
              }
            }
            $tabFieldContent .= preg_replace(
              '!<a !i',
              '$0class="btn btn-mod btn-border btn-medium btn-round uppercase" ',
              render($content[$tabKey])
            );
          }
          else {
            $tabFieldContent = render($content[$tabKey]);
          }

          $tabActiveClass = ($tabActive['tab'] == $tabKey) ? ' active in' : '';
          $tabPaneContent
            .= '<div class="tab-pane fade'
            .  $tabActiveClass
            .  '" id="tab-'
            .  $tabKey
            .  '">'
            .  $tabFieldContent
            .  '</div>';
          hide($content[$tabKey]);
        }
      }

      hide($content['field_subtitle']);
      hide($content['field_topic']);
      hide($content['field_topics']);

      print '<div class="episode-content-tab clearfix">';
      print   '<div class = "episode-pills">';
      print     '<h3>';
      print       filter_xss(drupal_get_title());
      print     '</h3>';
      print     render($content['field_subtitle']);
      print     '<ul class="nav nav-pills animate">';
      print       $tabContent;
      print     '</ul>';
      print     '<div class = "episode-tags">';
      print       render($content['field_topic']);
      print       render($content['field_topics']);
      print     '</div>';
      print   '</div>';
      print   '<div class = "tab-content section-text">';
      print     $tabPaneContent;
      print   '</div>';
      print '</div>';
    }
  ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
