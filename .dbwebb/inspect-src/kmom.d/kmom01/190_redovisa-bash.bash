#!/usr/bin/env bash
cd me/game || exit
e() { exit 0; }; export -f e # Success
f() { exit 1; }; export -f f # Fail

echo "[$ACRONYM] Do manual stuff (e/f to exit)"
ls -F
bash
