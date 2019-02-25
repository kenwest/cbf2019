#!/bin/bash
#
# Execute this after a Git merge

drush vset nikadevs_cms_layout_cbf2019 --format=json - < nikadevs_cms_layout_cbf2019.json

drush cc all
