#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd me/redovisa || exit

num=$( git tag | wc -l )
echo "[$ACRONYM] tags=$num"
git tag

req=5
(( $num >= $req ))
doLog $? "me/redovisa: Number of tags = $num (>$req)"
