#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd gui-repo || exit 1

target="phpcs"
#make $target >& /dev/null

file="build/$target"
lines=$( wc -l $file )

[[ ! $( cat $file ) ]]
doLog $? "$target: code style PSR12 ($lines)"
