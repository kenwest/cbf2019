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

/*
 * Render field_order_url, field_attachment, field_video, and field_content
 * as a set of tabs.
 */
$tabFields = [
  'field_order_url' => [
    'label' => '<i class="fal fa-fw fa-book"></i> &nbsp;Order hard copy',
    'weight' => 4,
  ],
  'field_attachment' => [
    'label' => '<i class="fal fa-fw fa-file-pdf"></i> &nbsp;Download PDF',
    'weight' => 3,
  ],
  'field_video' => [
    'label' => '<i class="fal fa-fw fa-video"></i> &nbsp;Play video',
    'weight' => 1,
  ],
  'field_content' => [
    'label' => '<i class="fal fa-fw fa-microphone"></i> &nbsp;Play audio',
    'weight' => 2,
  ],
];

$tabActive = [
  'tab' => '',
  'weight' => 100,
  'count' => 0,
];

foreach ($tabFields as $tabKey => $tabSettings) {
  if (isset($content[$tabKey])) {
    $tabActive['count']++;
    if ($tabSettings['weight'] < $tabActive['weight']) {
      $tabActive['tab'] = $tabKey;
      $tabActive['weight'] = $tabSettings['weight'];
    }
  }
}

if ($tabActive['count'] > 0) {
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

      switch ($tabKey) {
        case 'field_video':
          // Embed view which displays multiple videos with a pager
          $tabFieldContent = views_embed_view('cbf2019_content_videos', 'block_1');
          break;

        case 'field_order_url':
          // Format button
          $tabFieldContent = preg_replace(
            '!<a !i',
            '$0class="btn btn-mod btn-border btn-medium btn-round uppercase" ',
            render($content[$tabKey])
          );
          break;

        default:
          $tabFieldContent = render($content[$tabKey]);
          break;
      }

      $tabActiveClass = ($tabActive['tab'] == $tabKey) ? ' active in' : '';
      $tabPaneContent
        .= '<div class="image-overlay tab-pane fade'
        .  $tabActiveClass
        .  '" id="tab-'
        .  $tabKey
        .  '">'
        .  $tabFieldContent
        .  '</div>';
      hide($content[$tabKey]);
    }
  }

  // Hide fields that will be displayed in the episode-content-tab
  $content['field_episode_date']['#label_display'] = 'hidden';
  hide($content['field_in_activity']);
  hide($content['field_episode_date']);
  hide($content['field_subtitle']);
  hide($content['field_topic']);
  hide($content['field_topics']);

  // Display the episode-content-tab
  $typeSpecific = '';
  $typeSpecific .= '<div class="episode-content-tab clearfix">';
  $typeSpecific .=   '<div class = "episode-pills">';
  $typeSpecific .=     '<p class="h3">';
  $typeSpecific .=       filter_xss(drupal_get_title());
  $typeSpecific .=     '</p>';
  $typeSpecific .=     views_embed_view('cbf2019_activity_logo', 'block_2');
  $typeSpecific .=     render($content['field_episode_date']);
  $typeSpecific .=     render($content['field_subtitle']);
  if ($tabActive['count'] > 1) {
    $typeSpecific .=   '<ul class="nav nav-pills animate">';
    $typeSpecific .=     $tabContent;
    $typeSpecific .=   '</ul>';
  }
  $typeSpecific .=     '<div class = "episode-tags">';
  $typeSpecific .=       render($content['field_topic']);
  $typeSpecific .=       render($content['field_topics']);
  $typeSpecific .=     '</div>';
  $typeSpecific .=   '</div>';
  $typeSpecific .=   '<div class = "tab-content section-text">';
  $typeSpecific .=     '<div class = "overlaid-image">';
  if (!empty($content['field_highlight'])) {
    $typeSpecific .=     render($content['field_highlight']);
  }
  else {
    $typeSpecific .=     '<div class="field embed-responsive-16by9"></div>';
  }
  $typeSpecific .=     '</div>';
  $typeSpecific .=     $tabPaneContent;
  $typeSpecific .=   '</div>';
  $typeSpecific .= '</div>';
}

include 'node.tpl.php';