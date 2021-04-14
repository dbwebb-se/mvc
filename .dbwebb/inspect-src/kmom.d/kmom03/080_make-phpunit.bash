#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd gui-repo || exit 1

target="phpunit"
#make $target >& /dev/null

file="build/$target"
lines=$( wc -l $file )

[[ $( grep "\[OK] No errors" $file ) ]]
doLog $? "$target: NOT IMPLEMENTED ($lines)"
