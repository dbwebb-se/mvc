#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

cd $TARGET_DIR || exit 1

make clean-all install >& /dev/null

doLog $? "make clean-all install"
