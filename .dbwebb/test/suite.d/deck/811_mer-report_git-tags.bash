#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

TARGET_DIR="me/report"

req="2"

cd $TARGET_DIR || exit 1
[[ ! -d .git ]] && echo "Missing .git directory." && exit 1

num=$( git tag | wc -l )
echo "[$ACRONYM] tags=$num"
git tag

(( $num >= $req ))
doLog $? "Number of tags=$num (>=$req)"
