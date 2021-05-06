#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd $TARGET_DIR || exit 1

target="phpstan"
#make $target >& /dev/null

file="build/$target"

if [[ -f $file ]]; then
    lines=$( wc -l $file )
    [[ $( grep "\[OK] No errors" $file ) ]]
    doLog $? "$target: mess detected ($lines)"
else
    printf "Missing log file: '$file'\nWas the build successfully done and generated a logfile?\n"
    doLog 1 "$target: no log file detected"
fi
