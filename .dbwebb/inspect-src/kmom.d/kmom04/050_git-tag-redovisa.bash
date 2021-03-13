#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd me/redovisa || exit

lowtag="4.0.0"
hightag="5.0.0"
tag=$( hasGitTagBetween . $lowtag $hightag )
echo "[$ACRONYM] tag >= $lowtag and < $hightag ($tag)"

[[ ! -z $tag ]]
doLog $? "me/redovisa: Has tag between $lowtag and $hightag ($tag)"
