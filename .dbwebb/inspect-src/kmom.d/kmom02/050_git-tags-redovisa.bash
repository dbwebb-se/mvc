#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd me/redovisa || exit

num=$( git tag | wc -l )
echo "[$ACRONYM] tags=$num"
git tag

req=2
(( $num >= $req ))
doLog $? "Number of tags = $num (>$req)"
