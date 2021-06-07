<?php
/**
 * @file views-view-table.tpl.php
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $rows: An array of row items. Each row is an array of content
 *   keyed by field ID.
 * - $header: an array of haeaders(labels) for fields.
 * - $themed_rows: a array of rows with themed fields.
 * @ingroup views_templates
 */
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="initial-scale=1.0"><meta name="format-detection" content="telephone=no">
<title></title>
<style type="text/css">body{ Margin: 0; padding: 0; }
    img{ border: 0px; display: block; }

    .socialLinks{ font-size: 6px; }
    .socialLinks a{
      display: inline-block;
    }
    .socialIcon{
      display: inline-block;
      vertical-align: top;
      padding-bottom: 0px;
      margin-top: 22px;
      margin-left: 10px;
    }
    .oldwebkit{ max-width: 570px; }
    td.vb-outer{ padding-left: 9px; padding-right: 9px; }
    table.vb-container, table.vb-row, table.vb-content{
      border-collapse: separate;
    }
    table.vb-row{
      border-spacing: 9px;
    }
    table.vb-row.halfpad{
      border-spacing: 0;
      padding-left: 9px;
      padding-right: 9px;
    }
    table.vb-row.fullwidth{
      border-spacing: 0;
      padding: 0;
    }
    table.vb-container{
      padding-left: 18px;
      padding-right: 18px;
    }
    table.vb-container.fullpad{
      border-spacing: 18px;
      padding-left: 0;
      padding-right: 0;
    }
    table.vb-container.halfpad{
      border-spacing: 9px;
      padding-left: 9px;
      padding-right: 9px;
    }
    table.vb-container.fullwidth{
      padding-left: 0;
      padding-right: 0;
    }
</style>
<style type="text/css">/* yahoo, hotmail */
    .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{ line-height: 100%; }
    .yshortcuts a{ border-bottom: none !important; }
    .vb-outer{ min-width: 0 !important; }
    .RMsgBdy, .ExternalClass{
      width: 100%;
      background-color: #ffffff;
      background-color: #ffffff}

    /* outlook */
    table{ mso-table-rspace: 0pt; mso-table-lspace: 0pt; }
    #outlook a{ padding: 0; }
    img{ outline: none; text-decoration: none; border: none; -ms-interpolation-mode: bicubic; }
    a img{ border: none; }

    @media screen and (max-device-width: 600px), screen and (max-width: 600px) {
      table.vb-container, table.vb-row{
        width: 95% !important;
      }

      .mobile-hide{ display: none !important; }
      .mobile-textcenter{ text-align: center !important; }

      .mobile-full{
        float: none !important;
        width: 100% !important;
        max-width: none !important;
        padding-right: 0 !important;
        padding-left: 0 !important;
      }
      img.mobile-full{
        width: 100% !important;
        max-width: none !important;
        height: auto !important;
      }
    }
</style>
<center><!-- preheaderBlock -->
<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="vb-outer" id="ko_preheaderBlock_1" style="background-color: #ffffff;" width="100%">
  <tbody>
    <tr>
      <td align="center" bgcolor="#ffffff" class="vb-outer" style="padding-left: 9px; padding-right: 9px; background-color: #ffffff;" valign="top">
      <div style="display: none; font-size: 1px; color: #697891; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">&nbsp;</div>
      <!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]-->

      <div class="oldwebkit" style="max-width: 570px;">
      <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="vb-row halfpad" style="border-collapse: separate; border-spacing: 0; padding-left: 9px; padding-right: 9px; width: 100%; max-width: 570px; background-color: #ffffff;" width="570">
        <tbody>
          <tr>
            <td align="left" bgcolor="#ffffff" style="font-size: 0; background-color: #ffffff;" valign="top"><!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="552"><tr><![endif]--><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="276"><![endif]-->
            <div class="mobile-full" style="display: inline-block; max-width: 276px; vertical-align: top; width: 100%;">
            <table align="left" border="0" cellpadding="0" cellspacing="9" class="vb-content" style="border-collapse: separate; width: 100%;" width="276">
              <tbody>
                <tr>
                  <td align="left" style="font-weight: normal; text-align: left; font-size: 14px; padding-bottom: 22px; font-family: Calibri, Arial, Helvetica, sans-serif; color: #ffffff;" valign="top" width="100%"><a href="https://thirdspace.org.au" target="_new"><img alt="Third Space" src="https://thirdspace.org.au/sites/all/themes/cbf2019/images/thirdspace/brand/logo.png" style="border: 0px; display: block; width: 200px;" /></a></td>
                </tr>
              </tbody>
            </table>
            </div>
            <!--[if (gte mso 9)|(lte ie 8)]>
</td></tr></table><![endif]--></td>
          </tr>
        </tbody>
      </table>
      </div>
      <!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]--></td>
    </tr>
  </tbody>
</table>
<!-- /preheaderBlock -->

<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="vb-outer" id="ko_textBlock_1" style="background-color: #ffffff;" width="100%">
  <tbody>
    <tr>
      <td align="center" bgcolor="#ffffff" class="vb-outer" style="padding-left: 9px; padding-right: 9px; background-color: #ffffff;" valign="top"><!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]-->
      <div class="oldwebkit" style="max-width: 570px;">
      <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="18" class="vb-container fullpad" style="border-collapse: separate; border-spacing: 18px; padding-left: 0; padding-right: 0; width: 100%; max-width: 570px; background-color: #ffffff;" width="570">
        <tbody>
          <tr>
            <td align="left" class="long-text links-color" style="text-align: left; font-size: 14px; font-family: Calibri, Arial, Helvetica, sans-serif; color: #697891;">
            <p style="Margin: 1em 0px;">{contact.email_greeting},</p>
            <p style="Margin: 1em 0px;">You signed up to receive updates on Third Space content. Here are some recent articles posted on the Third Space site.</p>
            <p style="Margin: 1em 0px;">David Robertson<br />
            Director - Third Space</p>
            </td>
          </tr>
        </tbody>
      </table>
      </div>
      <!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]--></td>
    </tr>
  </tbody>
</table>

<?php
  /*
   * Find and display the first 'promoted' article
   */
  $promotedRow = false;

  foreach ($themed_rows as $row => $article) {
    if (empty($article['queue'])) {
      // Skip the $article is it is not in the 'promoted' queue
      continue;
    }
    else {
      $promotedRow = $row;
?>

<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="vb-outer" id="ko_singleArticleBlock_4" style="background-color: #ffffff;" width="100%">
  <tbody>
    <tr>
      <td align="center" bgcolor="#ffffff" class="vb-outer" style="padding-left: 9px; padding-right: 9px; background-color: #ffffff;" valign="top"><!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]-->
      <div class="oldwebkit" style="max-width: 570px;">
      <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="18" class="vb-container fullpad" style="border-collapse: separate; border-spacing: 18px; padding-left: 0; padding-right: 0; width: 100%; max-width: 570px; background-color: #ffffff;" width="570">
        <tbody>
          <tr>
            <td align="left" class="links-color" valign="top" width="100%">
              <img alt="" border="0" class="mobile-full attribute-width-534" hspace="0" src="<?php if (preg_match('/^.*src=\"([^"]+)\".*$/i', $article['field_highlight'], $matches) === 1) { print str_replace('third_space_grid', 'portfolio_653x368', $matches[1]); } else { print 'https://thirdspace.org.au/civicrm/mosaico/img?method=placeholder&params=534%2C267'; } ?>" style="border: 0px; display: block; vertical-align: top; max-width: 534px; width: 100%; height: auto;" vspace="0" width="534" />
            </td>
          </tr>
          <tr>
            <td>
            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
              <tbody>
                <tr>
                  <td style="font-weight: normal; font-size: 18px; font-family: Calibri, Arial, Helvetica, sans-serif; color: #cf2e4f; text-align: left;">
                    <span style="color: #cf2e4f; text-transform: uppercase; letter-spacing: 4px;"><?php print $article['title']; ?></span>
                  </td>
                </tr>
                <tr>
                  <td height="9" style="font-size: 1px; line-height: 1px;">&ensp;</td>
                </tr>
                <tr>
                  <td align="left" class="long-text links-color" style="text-align: left; font-size: 14px; font-family: Calibri, Arial, Helvetica, sans-serif; color: #697891;">
                  <?php if (!empty($article['field_subtitle'])) { ?>
                    <p style="Margin: 1em 0px;"><em><?php print $article['field_subtitle']; ?></em></p>
                  <?php } ?>
                  <?php if (strlen($article['body']) < 200) { ?>
                    <p style="Margin: 1em 0px;"><?php print $article['body']; ?></p>
                  <?php } else { ?>
                    <p style="Margin: 1em 0px;"><?php print substr($article['body'], 0, strrpos(substr($article['body'], 0, 200), ' ')) . ' &hellip;'; ?></p>
                  <?php } ?>
                  </td>
                </tr>
                <tr>
                  <td height="13" style="font-size: 1px; line-height: 1px;">&ensp;</td>
                </tr>
                <tr>
                  <td valign="top">
                  <table align="left" border="0" cellpadding="0" cellspacing="0" class="mobile-full">
                    <tbody>
                      <tr>
                        <?php
                          if (strpos($article['field_resource_type'], 'fa-video') !== false) {
                            $buttonLabel = 'Watch';
                          }
                          else if (strpos($article['field_resource_type'], 'fa-microphone') !== false) {
                            $buttonLabel = 'Listen';
                          }
                          else {
                            $buttonLabel = 'Read';
                          }
                        ?>
                        <td align="center" bgcolor="#ffffff" height="37" style="font-size: 12px; font-family: Calibri, Arial, Helvetica, sans-serif; text-align: center; color: #151515; font-weight: normal; background-color: #ffffff; border-radius: 2px; text-transform: uppercase;" valign="middle" width="auto">
                          <a href="<?php print $article['nid']; ?>" style="text-decoration: none; color: #151515; font-weight: normal; padding: 8px 37px; border: 2px solid #151515; letter-spacing: 2px;" target="_new"><?php print $buttonLabel; ?></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
        </tbody>
      </table>
      </div>
      <!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]--></td>
    </tr>
  </tbody>
</table>

<?php
      break;
    }
  }

  /*
   * Display all the other articles, excluding any articles created more than
   * N days ago (this exclusion is to prevent promoted content that is too old
   * from being displayed).
   */
  foreach ($themed_rows as $row => $article) {
    if ($promotedRow === $row) {
      continue;
    }

    if (!empty($article['created']) && !empty($article['expression'])) {
      $cutoff = time() - $article['expression'] * 24 * 60 * 60;
      if ($article['created']  < $cutoff) {
        continue;
      }
    }
?>

<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="vb-outer" id="ko_sideArticleBlock_<?php print $row; ?>" style="background-color: #ffffff;" width="100%">
  <tbody>
    <tr>
      <td align="center" bgcolor="#ffffff" class="vb-outer" style="padding-left: 9px; padding-right: 9px; background-color: #ffffff;" valign="top"><!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]-->
      <div class="oldwebkit" style="max-width: 570px;">
      <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="9" class="vb-row fullpad" style="border-collapse: separate; border-spacing: 9px; width: 100%; max-width: 570px; background-color: #ffffff;" width="570">
        <tbody>
          <tr>
            <td align="center" class="mobile-row" style="font-size: 0;" valign="top"><!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="552"><tr><![endif]--><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="276"><![endif]-->
            <div class="mobile-full" style="display: inline-block; max-width: 276px; vertical-align: top; width: 100%;">
            <table align="left" border="0" cellpadding="0" cellspacing="9" class="vb-content" style="border-collapse: separate; width: 100%;" width="276">
              <tbody>
                <tr>
                  <td align="left" class="links-color" valign="top" width="100%">
                    <img alt="" border="0" class="mobile-full attribute-width-166" hspace="0" src="<?php if (preg_match('/^.*src=\"([^"]+)\".*$/i', $article['field_highlight'], $matches) === 1) { print $matches[1]; } else { print 'https://thirdspace.org.au/civicrm/mosaico/img?method=placeholder&params=258%2C208'; } ?>" style="border: 0px; display: block; vertical-align: top; width: 100%; height: auto; max-width: 258px;" vspace="0" width="258" />
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
            <!--[if (gte mso 9)|(lte ie 8)]></td>
<![endif]--><!--[if (gte mso 9)|(lte ie 8)]>
<td align="left" valign="top" width="276">
<![endif]-->

            <div class="mobile-full" style="display: inline-block; max-width: 276px; vertical-align: top; width: 100%;">
            <table align="left" border="0" cellpadding="0" cellspacing="9" class="vb-content" style="border-collapse: separate; width: 100%;" width="276">
              <tbody>
                <tr>
                  <td style="font-weight: normal; font-size: 18px; font-family: Calibri, Arial, Helvetica, sans-serif; color: #cf2e4f; text-align: left;">
                    <span style="color: #cf2e4f; text-transform: uppercase; letter-spacing: 4px;"><?php print $article['title']; ?></span>
                  </td>
                </tr>
                <tr>
                  <td align="left" class="long-text links-color" style="text-align: left; font-size: 14px; font-family: Calibri, Arial, Helvetica, sans-serif; color: #697891;">
                  <?php if (!empty($article['field_subtitle'])) { ?>
                    <p style="Margin: 1em 0px;"><em><?php print $article['field_subtitle']; ?></em></p>
                  <?php } ?>
                  <?php if (strlen($article['body']) < 200) { ?>
                    <p style="Margin: 1em 0px;"><?php print $article['body']; ?></p>
                  <?php } else { ?>
                    <p style="Margin: 1em 0px;"><?php print substr($article['body'], 0, strrpos(substr($article['body'], 0, 200), ' ')) . ' &hellip;'; ?></p>
                  <?php } ?>
                  </td>
                </tr>
                <tr>
                  <td valign="top">
                  <table align="left" border="0" cellpadding="0" cellspacing="0" class="mobile-full" style="padding-top: 4px;">
                    <tbody>
                      <tr>
                        <?php
                          if (strpos($article['field_resource_type'], 'fa-video') !== false) {
                            $buttonLabel = 'Watch';
                          }
                          else if (strpos($article['field_resource_type'], 'fa-microphone') !== false) {
                            $buttonLabel = 'Listen';
                          }
                          else {
                            $buttonLabel = 'Read';
                          }
                        ?>
                        <td align="center" bgcolor="#ffffff" height="37" style="font-size: 12px; font-family: Calibri, Arial, Helvetica, sans-serif; text-align: center; color: #151515; font-weight: normal; background-color: #ffffff; border-radius: 2px; text-transform: uppercase;" valign="middle" width="auto">
                          <a href="<?php print $article['nid']; ?>" style="text-decoration: none; color: #151515; font-weight: normal; padding: 8px 37px; border: 2px solid #151515; letter-spacing: 2px;" target="_new"><?php print $buttonLabel; ?></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
            <!--[if (gte mso 9)|(lte ie 8)]></td>
<![endif]--><!--[if (gte mso 9)|(lte ie 8)]></tr></table><![endif]--></td>
          </tr>
        </tbody>
      </table>
      </div>
      <!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]--></td>
    </tr>
  </tbody>
</table>

<?php
  }
?>

<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="vb-outer" id="ko_spacerBlock_11" style="background-color: #ffffff;" width="100%">
  <tbody>
    <tr>
      <td align="center" bgcolor="#ffffff" class="vb-outer" height="24" style="padding-left: 9px; padding-right: 9px; height: 24px; background-color: #ffffff; font-size: 1px; line-height: 1px;" valign="top">&ensp;</td>
    </tr>
  </tbody>
</table>

<table bgcolor="#697891" border="0" cellpadding="0" cellspacing="0" id="ko_socialBlock_12" style="background-color: #697891;" width="100%">
  <tbody>
    <tr>
      <td align="center" bgcolor="#697891" style="background-color: #697891;" valign="top"><!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]-->
      <div class="oldwebkit" style="max-width: 570px;">
      <table align="center" border="0" cellpadding="0" cellspacing="9" class="vb-row fullpad" style="border-collapse: separate; border-spacing: 9px; width: 100%; max-width: 570px;" width="570">
        <tbody>
          <tr>
            <td align="center" style="font-size: 0;" valign="top"><!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="552"><tr><![endif]--><!--[if (gte mso 9)|(lte ie 8)]><td align="left" valign="top" width="276"><![endif]-->
            <div class="mobile-full" style="display: inline-block; max-width: 276px; vertical-align: top; width: 100%;">
            <table align="left" border="0" cellpadding="0" cellspacing="9" class="vb-content" style="border-collapse: separate; width: 100%;" width="276">
              <tbody>
                <tr>
                  <td align="left" class="long-text links-color mobile-textcenter" style="font-size: 14px; font-family: Calibri, Arial, Helvetica, sans-serif; color: #989898; text-align: left;" valign="middle">
                  <p style="Margin: 1em 0px;"><a href="https://thirdspace.org.au" style="color: #cccccc; color: #cccccc; text-decoration: underline;"><img alt="Third Space" src="https://thirdspace.org.au/sites/all/themes/cbf2019/images/thirdspace/brand/logo-white.png" style="border: 0px; display: block; width: 200px;" /> </a></p>
                  </td>
                </tr>
              </tbody>
            </table>
            </div>
            <!--[if (gte mso 9)|(lte ie 8)]></td>
<td align="left" valign="top" width="276">
<![endif]-->

            <div class="mobile-full" style="display: inline-block; max-width: 276px; vertical-align: top; width: 100%;">
            <table align="right" border="0" cellpadding="0" cellspacing="9" class="vb-content" style="border-collapse: separate; width: 100%;" width="276">
              <tbody>
                <tr>
                  <td align="right" class="links-color socialLinks mobile-textcenter" style="font-size: 6px;" valign="middle"><span>&ensp;</span> <a href="https://www.facebook.com/ThirdSpace.org.au/" style="display: inline-block; color: #cccccc; color: #cccccc; text-decoration: underline;" target="_new"> <img alt="Facebook" class="socialIcon" src="https://citybibleforum.org/sites/default/files/civicrm/extensions/uk.co.vedaconsulting.mosaico/packages/mosaico/templates/versafix-1/img/social_def/facebook_ok.png" style="border: 0px; display: inline-block; vertical-align: top; padding-bottom: 0px; margin-top: 22px; margin-left: 10px;" /> </a> <span>&ensp;</span> <a href="https://www.linkedin.com/company/city-bible-forum" style="display: inline-block; color: #cccccc; color: #cccccc; text-decoration: underline;" target="_new"> <img alt="Linkedin" border="0" class="socialIcon" src="https://citybibleforum.org/sites/default/files/civicrm/extensions/uk.co.vedaconsulting.mosaico/packages/mosaico/templates/versafix-1/img/social_def/linkedin_ok.png" style="border: 0px; display: inline-block; vertical-align: top; padding-bottom: 0px; margin-top: 22px; margin-left: 10px;" /> </a> <span>&ensp;</span> <a href="https://www.youtube.com/channel/UCt6UOWsDrMxXUeFb1cSvQSg" style="display: inline-block; color: #cccccc; color: #cccccc; text-decoration: underline;" target="_new"> <img alt="Youtube" border="0" class="socialIcon" src="https://citybibleforum.org/sites/default/files/civicrm/extensions/uk.co.vedaconsulting.mosaico/packages/mosaico/templates/versafix-1/img/social_def/youtube_ok.png" style="border: 0px; display: inline-block; vertical-align: top; padding-bottom: 0px; margin-top: 22px; margin-left: 10px;" /> </a></td>
                </tr>
              </tbody>
            </table>
            </div>
            <!--[if (gte mso 9)|(lte ie 8)]></td><![endif]--><!--[if (gte mso 9)|(lte ie 8)]></tr></table><![endif]--></td>
          </tr>
        </tbody>
      </table>
      </div>
      <!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]--></td>
    </tr>
  </tbody>
</table>
<!-- civimailBlock -->

<table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0" class="vb-outer" id="ko_civimailBlock_2" style="background-color: #ffffff;" width="100%">
  <tbody>
    <tr>
      <td align="center" bgcolor="#ffffff" class="vb-outer" style="padding-left: 9px; padding-right: 9px; background-color: #ffffff;" valign="top"><!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]-->
      <div class="oldwebkit" style="max-width: 570px;">
      <table bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="9" class="vb-container halfpad" style="border-collapse: separate; border-spacing: 9px; padding-left: 9px; padding-right: 9px; width: 100%; max-width: 570px; background-color: #ffffff;" width="570">
        <tbody>
          <tr>
            <td align="center" bgcolor="#ffffff" style="background-color: #ffffff;" valign="top">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
              <tbody>
                <tr>
                  <td align="left" class="long-text links-color" style="text-align: left; font-size: 14px; font-family: Calibri, Arial, Helvetica, sans-serif; color: #8793a7;" valign="top">&ensp;<br />
                  &ensp;</td>
                </tr>
                <tr>
                  <td align="left" class="long-text links-color" style="text-align: left; font-size: 14px; font-family: Calibri, Arial, Helvetica, sans-serif; color: #8793a7;" valign="top">This email was sent to: {contact.display_name}<br />
                  <br />
                  <a href="{action.unsubscribeUrl}" style="color: #697891;" target="_new">Stop</a> receiving emails on this topic<br />
                  or <a href="{action.optOutUrl}" style="color: #697891;" target="_new">never receive</a> bulk emails from us again</td>
                  <td align="left" class="long-text links-color" style="text-align: left; font-size: 14px; font-family: Calibri, Arial, Helvetica, sans-serif; color: #8793a7;" valign="top">National office:<br />
                  {domain.address}</td>
                </tr>
              </tbody>
            </table>
            </td>
          </tr>
        </tbody>
      </table>
      </div>
      <!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]--></td>
    </tr>
  </tbody>
</table>
<!-- /civimailBlock --></center>
