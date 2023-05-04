#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

TARGET_DIR="me/report"
cd $TARGET_DIR || exit 1

target="phpunit"
file="build/$target"
install -d build
XDEBUG_MODE=coverage vendor/bin/phpunit >& "$file"

if [[ -f $file ]]; then
    ls -l "$file"
    lines=$( wc -l $file )
    res=$( grep 'OK (' $file )
    [[ $res ]]
    status=$?
    doLog $status "$target: $res"
else
    printf "Missing log file: '$file'\nWas the build successfully done and generated a logfile?\n"
    doLog 1 "$target: no log file detected"
fi
