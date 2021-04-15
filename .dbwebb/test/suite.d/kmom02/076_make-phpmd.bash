#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd $TARGET_DIR || exit 1

target="phpmd"
#make $target >& /dev/null

file="build/$target"
lines=$( wc -l $file )

[[ ! $( cat $file ) ]]
doLog $? "$target: mess detected ($lines)"
