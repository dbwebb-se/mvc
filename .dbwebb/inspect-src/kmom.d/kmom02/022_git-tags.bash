#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

cd $TARGET_DIR || exit 1
[[ ! -d .git ]] && echo "Missing .git directory." && exit 1

num=$( git tag | wc -l )
echo "[$ACRONYM] tags=$num"
git tag

req=2
(( $num >= $req ))
doLog $? "Number of tags = $num (>=$req)"
