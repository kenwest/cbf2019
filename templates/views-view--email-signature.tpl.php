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

  $domainId = domain_get_domain()['domain_id'];
  $domainUrl = domain_get_domain()['subdomain'];
  $christianDomainId = domain_load_domain_id('christian');
  switch ($domainId) {
    case $christianDomainId:
      $audience = 'christian';
      $brandColour = '#1c9cd6';
      break;
    default:
      $audience = 'general';
      $brandColour = '#cf2e4f';
      break;
  }

?>

<div class="bold-is-bold">
  <p>This page is a template for staff email signatures. It is only visible to
  staff. Read these notes and copy it into GMail.</p>
  <ol>
  <li>This page will give you an email template for City Bible Forum or for
  Third Space, depending on the site at which you visit it.</li>
  <li>The template will work for GMail which is our supported email client. If
  it works with other clients then that is a bonus.</li>
  <li>After pasting it into GMail, edit the text. Note that you need to change
  both the text of the email address, plus the email address to which it links.</li>
  <li>There will be slight differences between the font displayed here and the
  font displayed in the email template.</li>
  </ol>
  <p>Copy everything under this text into your signature. For example, on my
  computer, I click down my mouse above the top-left corner of the signature
  text, drag it to the bottom-right, and then release the mouse. Then Cntl-C
  here, then Cntl-V into the signature field.</p>
  <p>&nbsp;</p>

  <table cellspacing="0" style="border-collapse:collapse;border:none">
    <tbody>
      <tr>
        <td style="border-color:white rgb(15,46,56) white white;border-style:solid;border-width:1px;padding:5pt;vertical-align:top">
          <p style="line-height:1.2;margin-top:0px;margin-bottom:0px;margin-right:5pt">
            <img src="https://<?php print $domainUrl; ?>/sites/all/themes/cbf2019/images/<?php print $audience; ?>/brand/logo-email.png" style="border:none;width:100%;height:auto;max-width:160px;" width="160">
          </p>
        </td>
        <td style="border-color:white white white rgb(15,46,56);border-style:solid;border-width:1px;padding:5pt;vertical-align:top">
          <p style="line-height:1.2;margin-top:0pt;margin-bottom:10pt;margin-left:5pt;font-family:calibri,Arial,Helvetica,sans-serif;color:rgb(15,46,56)">
            <font size="4">
              <strong>Your name</strong>
              <span style="color:<?php print $brandColour; ?>"><strong>Your title</strong></span>
            </font>
          </p>
          <p style="line-height:1.2;margin-top:0pt;margin-bottom:0pt;margin-left:5pt;font-family:calibri,Arial,Helvetica,sans-serif;font-size:10pt;color:rgb(15,46,56)">
            <span style="white-space:pre-wrap"><strong>T:</strong> Office number | </span>
            <span style="white-space:pre-wrap"><strong>M:</strong> Mobile number</span>
            <br>
            <span style="white-space:pre-wrap"><strong>E:</strong> <a href="mailto:info@<?php print $domainUrl; ?>" style="color:<?php print $brandColour; ?>" target="_blank">Email address and link</a></span>
            <span style="white-space:pre-wrap"> | </span>
            <span style="white-space:pre-wrap"><strong>W:</strong> <a href="https://<?php print $domainUrl; ?>/" style="color:<?php print $brandColour; ?>" target="_blank"><?php print $domainUrl; ?></a></span>
          </p>
          <p style="line-height:1.2;margin-top:0pt;margin-bottom:0pt;margin-left:5pt;font-family:calibri,Arial,Helvetica,sans-serif;font-size:10pt;color:rgb(15,46,56)">
            <span style="white-space:pre-wrap">Office address on one line</span>
          </p>
        </td>
      </tr>
    </tbody>
  </table>
  <table cellspacing="0" style="border-collapse:collapse;border:none;width:100%;max-width:520px;" width="520">
    <tbody>
      <tr>
        <td colspan="2" style="border-color:white ;border-style:solid;border-width:1px;padding:5pt;vertical-align:top;width:100%;">
          <a href="https://<?php print $domainUrl; ?>/domain/<?php print $audience; ?>/promotional/link">
            <img src="https://<?php print $domainUrl; ?>/domain/<?php print $audience; ?>/promotional/image" style="border:none;width:100%;height:auto;max-width:500px;" width="500">
          </a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
