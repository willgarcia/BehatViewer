#!/bin/sh

BASEDIR=$(dirname $0)
BASEDIR=$(readlink -f "$BASEDIR/..")
ROOTDIR=$(readlink -f "$BASEDIR/..")

VHOSTNAME="virtualhost.local"
if [ "$1" ]
then
    VHOSTNAME="$1"
fi

BROWSERNAME="phantomjs"
if [ "$2" ]
then
    BROWSERNAME="$2"
fi

FEATURES="$ROOTDIR/features"
if [ "$3" ]
then
    FEATURES="$3"
fi

BOOTSTRAP="$FEATURES/Context"
if [ "$4" ]
then
    BOOTSTRAP="$4"
fi

CONFIG="$BASEDIR/behat/behat.yml-dist"
if [ "$5" ]
then
    CONFIG="$5"
fi

echo "---> Starting $(tput bold ; tput setaf 2)Behat configuration$(tput sgr0)"
echo "---> Virtualhost name : $(tput bold ; tput setaf 3)$VHOSTNAME$(tput sgr0)"
echo "---> Browser name : $(tput bold ; tput setaf 3)$BROWSERNAME$(tput sgr0)"
echo "---> Features path : $(tput bold ; tput setaf 3)$FEATURES$(tput sgr0)"
echo "---> Bootstrap path : $(tput bold ; tput setaf 3)$BOOTSTRAP$(tput sgr0)"
echo "---> Configuration file path : $(tput bold ; tput setaf 3)$CONFIG$(tput sgr0)"
echo "---> Destionation file path : $(tput bold ; tput setaf 3)$ROOTDIR/behat.yml$(tput sgr0)"

sed s/%hostname%/$VHOSTNAME/ "$CONFIG" | sed s/%browser%/$BROWSERNAME/ | sed s?%features%?$FEATURES? | sed s?%bootstrap%?$BOOTSTRAP? | sed 's?%behat_viewer_url%?http://behat-viewer-ci.jubianchi.fr/analyze?'> $ROOTDIR/behat.yml