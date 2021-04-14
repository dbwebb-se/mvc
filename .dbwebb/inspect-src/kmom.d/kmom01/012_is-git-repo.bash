#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

cd gui-repo || exit 1
[[ -d .git ]]
status=$?
doLog $status "is Git repo" 1
