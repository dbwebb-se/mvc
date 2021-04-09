#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

cd gui-repo || exit 1
[[ ! -d .git ]] && echo "Missing .git directory." && exit 1

num=$( git tag | wc -l )
echo "[$ACRONYM] tags=$num"
git tag

req=1
(( $num >= $req ))
doLog $? "Number of tags = $num (>=$req)"
