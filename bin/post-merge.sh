#!/bin/bash
#
# Execute this after a Git merge

drush vset nikadevs_cms_layout_cbf2019 --format=json - < nikadevs_cms_layout_cbf2019.json
drush vset nikadevs_cms_layout_cbootf  --format=json - < nikadevs_cms_layout_cbf2019.json

drush -l reaching.city cc all