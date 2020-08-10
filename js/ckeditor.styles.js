// This file contains style definitions that can be used by CKEditor plugins.
//
// There is a styleset for CiviCRM and Drupal. The CiviCRM one is a subset of
// those styles that can be used in emails.

CKEDITOR.stylesSet.add( 'civicrm', [
  /*
   * The 'civicrm' styleset only includes those styles that can be used in CiviMails.
   * So, no styles include class attributes.
   */

  /* Block Styles */

   { name: 'Paragraph + spacer', element: 'p', styles: { 'margin-bottom': '40px' } }

  /* Inline Styles */

  ,{ name: 'White text',         element: 'span', styles: { 'color': 'white' } }
  ,{ name: 'City blue text',     element: 'span', styles: { 'color': 'rgb(28, 156, 214)' } }
  ,{ name: 'Midnight blue text', element: 'span', styles: { 'color': 'rgb(15, 46, 56)' } }
  ,{ name: 'Cardinal text',      element: 'span', styles: { 'color': 'rgb(207, 46, 79)' } }
  ,{ name: 'Slate text',         element: 'span', styles: { 'color': 'rgb(105, 120, 145)' } }
  ,{ name: 'Sea Foam text',      element: 'span', styles: { 'color': 'rgb(163, 199, 199)' } }
  ,{ name: 'Normal text',        element: 'span', styles: { 'color': '' } }

  /* Object Styles */

  ,{ name: 'White link',         element: 'a', styles: { 'color': 'white' } }
  ,{ name: 'City blue link',     element: 'a', styles: { 'color': 'rgb(28, 156, 214)' } }
  ,{ name: 'Midnight blue link', element: 'a', styles: { 'color': 'rgb(15, 46, 56)' } }
  ,{ name: 'Cardinal link',      element: 'a', styles: { 'color': 'rgb(207, 46, 79)' } }
  ,{ name: 'Slate link',         element: 'a', styles: { 'color': 'rgb(105, 120, 145)' } }
  ,{ name: 'Sea Foam link',      element: 'a', styles: { 'color': 'rgb(163, 199, 199)' } }
  ,{ name: 'Normal link',        element: 'a', styles: { 'color': '' } }

  ,{ name: 'Float left image',
     element: 'img',
     styles: { 'float': 'left', 'margin-right': '10px', 'margin-bottom': '10px' }
   }
  ,{ name: 'Float right image',
     element: 'img',
     styles: { 'float': 'right', 'margin-left': '10px', 'margin-bottom': '10px' }
   }
] );

CKEDITOR.stylesSet.add( 'drupal', [
  /*
   * The 'drupal' styleset includes a wider range of styles.
   */

  /* Block Styles */

   { name: 'Link button',           element: 'p', attributes: { 'class': 'link-button' } }
  ,{ name: 'Paragraph + spacer',    element: 'p', attributes: { 'class': 'paragraph-plus-spacer' } }
  ,{ name: 'Paragraph image left',  element: 'p', attributes: { 'class': 'paragraph-image-left' } }
  ,{ name: 'Paragraph image right', element: 'p', attributes: { 'class': 'paragraph-image-right' } }

  /* Inline Styles */

  ,{ name: 'White text',         element: 'span', styles: { 'color': 'white' } }
  ,{ name: 'City blue text',     element: 'span', styles: { 'color': 'rgb(28, 156, 214)' } }
  ,{ name: 'Midnight blue text', element: 'span', styles: { 'color': 'rgb(15, 46, 56)' } }
  ,{ name: 'Cardinal text',      element: 'span', styles: { 'color': 'rgb(207, 46, 79)' } }
  ,{ name: 'Slate text',         element: 'span', styles: { 'color': 'rgb(105, 120, 145)' } }
  ,{ name: 'Sea Foam text',      element: 'span', styles: { 'color': 'rgb(163, 199, 199)' } }
  ,{ name: 'Normal text',        element: 'span', styles: { 'color': '' } }

  /* Object Styles */

  ,{ name: 'White link',         element: 'a', styles: { 'color': 'white' } }
  ,{ name: 'City blue link',     element: 'a', styles: { 'color': 'rgb(28, 156, 214)' } }
  ,{ name: 'Midnight blue link', element: 'a', styles: { 'color': 'rgb(15, 46, 56)' } }
  ,{ name: 'Cardinal link',      element: 'a', styles: { 'color': 'rgb(207, 46, 79)' } }
  ,{ name: 'Slate link',         element: 'a', styles: { 'color': 'rgb(105, 120, 145)' } }
  ,{ name: 'Sea Foam link',      element: 'a', styles: { 'color': 'rgb(163, 199, 199)' } }
  ,{ name: 'Normal link',        element: 'a', styles: { 'color': '' } }

  ,{ name: 'Float left image',
     element: 'img',
     styles: { 'float': 'left', 'margin-right': '10px', 'margin-bottom': '10px' }
   }
  ,{ name: 'Float right image',
     element: 'img',
     styles: { 'float': 'right', 'margin-left': '10px', 'margin-bottom': '10px' }
   }
  ,{ name: 'Responsive image',
     element: 'img',
     attributes: { 'class': 'img-responsive' },
     styles:     { 'height' : '' }
   }
] );
