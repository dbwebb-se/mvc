#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd $TARGET_DIR || exit 1

make clean-all >& /dev/null
status=$?
(( $status )) && printf "Failed executing 'make clean-all'.\n"
doLog $status "make clean-all"
