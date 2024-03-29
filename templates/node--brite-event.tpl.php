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

// Hide fields that will be displayed in the $typeSpecific variable
hide($content['field_in_activity']);
hide($content['field_subtitle']);
hide($content['field_with']);
hide($content['field_highlight']);
hide($content['field_event_options']);
hide($content['field_registration_buttons']);
hide($content['body']);
hide($content['field_attachment']);
hide($content['field_staff_member']);

// Hide links
$suppressLinks = true;

// Display the $typeSpecific for courses
$output_logo = views_embed_view('cbf2019_activity_logo', 'block_2');
$output_title = filter_xss(drupal_get_title());
$output_subtitle = render($content['field_subtitle']);
$output_date = render($content['field_national_date_text']);
$output_with = views_embed_view('cbf2019_speaker_listings', 'block_1'); // Event Speaker links
if (trim(strip_tags($output_with))) {
  $output_with = '<a href="#cbf2019-speakers-view-header">' . $output_with . '</a>';
}
$output_location = views_embed_view('cbf2019_event_location', 'block');
$output_highlight = render($content['field_highlight']);
$output_event_options = render($content['field_event_options']);
if (trim(strip_tags($output_event_options))) {
  $output_event_options = preg_replace('/(\$[0-9]+)(\.00)/', '$1<span style="visibility: hidden;">$2</span>', $output_event_options) ?? $output_event_options;
}
else {
  $output_event_options = '<p class="uppercase">Registration is free</p>';
}
$output_registration_buttons = cbf_eventbrite_registration_buttons($content['field_registration_buttons']);
$output_body = render($content['body']);
$output_attachment = render($content['field_attachment']);
$output_staff_member = render($content['field_staff_member']);

$typeSpecific = "
<div class=\"eventbrite-event-content-tab\">
  <div class=\"row\">
    <div class=\"col-xs-12 col-sm-6 col-sm-push-6 col-md-5 col-md-push-7 col-lg-4 col-lg-push-8\">
      $output_logo
      <p class=\"h3\">
        $output_title
      </p>
      $output_subtitle
      $output_date
      $output_with
      $output_location
    </div>
    <div class=\"col-xs-12 col-sm-6 col-sm-pull-6 col-md-7 col-md-pull-5 col-lg-pull-4\">
      $output_highlight
    </div>
  </div>
  <div class=\"row\">
    <div class=\"col-xs-12 col-md-3\">
      <div class=\"row\">
        <div class=\"col-xs-12 col-sm-6 col-md-12\">
          $output_event_options
        </div>
        <div class=\"col-xs-12 col-sm-6 col-md-12\">
          $output_registration_buttons
        </div>
      </div>
    </div>
    <div class=\"col-xs-12 col-md-9 col-lg-8 col-lg-offset-1\">
      $output_body
      $output_attachment
      $output_staff_member
    </div>
  </div>
</div>
";

include 'node.tpl.php';
