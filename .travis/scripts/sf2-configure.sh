#!/bin/sh

BASEDIR=$(dirname $0)
BASEDIR=$(readlink -f "$BASEDIR/..")
ROOTDIR=$(readlink -f "$BASEDIR/..")

DBNAME="myapp_test"
if [ "$1" ]
then
    DBNAME="$1"
fi

echo "---> Starting $(tput bold ; tput setaf 2)Symfony2 project configuration$(tput sgr0)"
echo "---> MySQL database name : $(tput bold ; tput setaf 3)$DBNAME$(tput sgr0)"

sed s/%database_name%/$DBNAME/ "$ROOTDIR/app/config/parameters.ini-dist" | sed s/%database_login%/root/ | sed s/%database_password%// | sed s/%secret%/ThisTokenIsNotSoSecret/ > "$ROOTDIR/app/config/parameters.ini"