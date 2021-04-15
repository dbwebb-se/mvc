#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd $TARGET_DIR || exit 1

target="phpstan"
#make $target >& /dev/null

file="build/$target"
lines=$( wc -l $file )

[[ $( grep "\[OK] No errors" $file ) ]]
doLog $? "$target: mess detected ($lines)"
