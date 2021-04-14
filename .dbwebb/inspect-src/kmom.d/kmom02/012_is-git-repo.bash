#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

cd gui-repo || exit 1
[[ -d .git ]]
doLog $? "is Git repo" 1
