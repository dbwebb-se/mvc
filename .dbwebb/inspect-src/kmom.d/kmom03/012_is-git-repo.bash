#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

cd $TARGET_DIR || exit 1
[[ -d .git ]]
doLog $? "is Git repo" 1
