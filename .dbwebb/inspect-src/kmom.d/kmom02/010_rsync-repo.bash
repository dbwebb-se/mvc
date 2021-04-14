#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

# Rsync the target dir/repo to a temp space
install -d gui-repo/ || exit 1
rm -rf gui-repo/{*,.??*} || exit 1
rsync -a --delete me/game/ gui-repo/ || exit 1
