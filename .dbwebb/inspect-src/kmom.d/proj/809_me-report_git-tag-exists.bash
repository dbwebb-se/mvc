#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

TARGET_DIR="me/report"

lowtag="10.0.0"
hightag="11.0.0"

cd $TARGET_DIR || exit 1
[[ ! -d .git ]] && echo "Missing .git directory." && exit 1

tag=$( hasGitTagBetween . $lowtag $hightag )
echo "[$ACRONYM] tag >= $lowtag and < $hightag ($tag)"

[[ ! -z $tag ]]
doLog $? "Has tag between $lowtag and $hightag ($tag)"
