#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd $TARGET_DIR || exit 1

target="coverage"
#make $target >& /dev/null

file="build/$target.clover"
res=$( grep '    <metrics files=' $file )

echo $res

[[ -f $file ]]
doLog $? "$target:"
