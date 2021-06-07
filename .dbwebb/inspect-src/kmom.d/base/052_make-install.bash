#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd $TARGET_DIR || exit 1

make install >& /dev/null
status=$?
(( $status )) && printf "Failed executing 'make install'.\n"
doLog $status "make install"
