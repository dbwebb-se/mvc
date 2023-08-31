#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

TARGET_DIR="me/report"

cd $TARGET_DIR || exit 1
[[ ! -d .git ]] && echo "Missing .git directory." && exit 1

# git v 2.30.2 otherwise error message
git config --global --add safe.directory /home/dbwebb/repo/me/report 

gitUrl=$( git config --get remote.origin.url )
[[ $gitUrl ]]
doLog $? "remote = '$gitUrl'" 1
