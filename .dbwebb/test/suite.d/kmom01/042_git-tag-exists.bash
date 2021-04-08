#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

cd me/game || exit

lowtag="1.0.0"
hightag="2.0.0"
tag=$( hasGitTagBetween . $lowtag $hightag )
echo "[$ACRONYM] tag >= $lowtag and < $hightag ($tag)"

[[ ! -z $tag ]]
doLog $? "Has tag between $lowtag and $hightag ($tag)"
