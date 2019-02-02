#!/bin/bash
#
# Process the Drupal variables and Less files

drush vget nikadevs_cms_layout_cbf2019 --format=json > nikadevs_cms_layout_cbf2019.json

lessc less/custom.less > css/custom.css
yui-compressor css/custom.css > css/custom.min.css
drush cc css-js
