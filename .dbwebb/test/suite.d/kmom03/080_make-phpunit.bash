#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd $TARGET_DIR || exit 1

target="phpunit"
#make $target >& /dev/null

file="build/$target"
lines=$( wc -l $file )

res=$( grep 'OK (' $file )
[[ $res ]]
status=$?
if [[ !$res ]]; then
    doLog $status "$target: $res"
else
    doLog $status "$target: NOT IMPLEMENTED"
fi
