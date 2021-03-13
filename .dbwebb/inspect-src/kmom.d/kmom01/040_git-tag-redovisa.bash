#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd me/redovisa || exit

lowtag="1.0.0"
hightag="2.0.0"
tag=$( hasGitTagBetween . $lowtag $hightag )
echo "[$ACRONYM] tag >= $lowtag and < $hightag ($tag)"

[[ ! -z $tag ]]
doLog $? "Has tag between $lowtag and $hightag ($tag)"
