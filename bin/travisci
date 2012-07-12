#!/bin/sh
export HOST="behat.local"
export DATABASE="behat"
export BROWSER="phantomjs"

sh -e .travis/scripts/apt-get.sh
sh -e .travis/scripts/apache2-vhost.sh $HOST
sh -e .travis/scripts/apache2-configure.sh $HOST
sh -e .travis/scripts/mysql.sh "test_$DATABASE"
sh -e .travis/scripts/sahi-install.sh

sh -e .travis/scripts/sf2-configure.sh $DATABASE
sh -e .travis/scripts/behat-configure.sh $HOST $BROWSER "" "" behat.yml-dist
sed s?%behat_viewer_url%?http://behat-viewer-ci.jubianchi.fr/analyze? behat.yml > behat.yml
sh -e .travis/scripts/sahi-configure.sh
sh -e .travis/scripts/sf2-init.sh
sh -e .travis/scripts/sahi-start.sh

php behat.phar --profile=travis @BehatViewerBundle
