#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

cd gui-repo || exit 1

make clean-all install >& /dev/null

doLog $? "make clean-all install"
