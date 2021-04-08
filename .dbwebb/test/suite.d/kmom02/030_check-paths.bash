#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

cd me/game || exit 1

all=0
fail=0
for dir in .git config htdocs src view; do
    (( all++ ))
    if [[ ! -d "$dir" ]]; then
        printf "Missing '$dir' dir.\n"
        (( fail++ ))
    fi
done

doLog $fail "check dirs ("$(( all-fail ))"/$all)"
