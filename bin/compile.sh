#!/bin/bash
#
# Process the Drupal variables and Less files

drush vget nikadevs_cms_layout_cbf2019 --format=json > nikadevs_cms_layout_cbf2019.json

#lessc less/style.less > css/style.css
#yui-compressor css/style.css > css/style.min.css
#drush -l reaching.city cc css-js
