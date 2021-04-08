#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

cd me/game || exit

num=$( git tag | wc -l )
echo "[$ACRONYM] tags=$num"
git tag

req=1
(( $num >= $req ))
doLog $? "Number of tags = $num (>=$req)"
