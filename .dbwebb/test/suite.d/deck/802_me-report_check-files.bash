#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

TARGET_DIR="me/report"
CHECK_FILES="composer.json composer.lock public/.htaccess
    tools/php-cs-fixer/vendor/bin/php-cs-fixer
"

cd $TARGET_DIR || exit 1

all=0
fail=0
for file in $CHECK_FILES; do
    (( all++ ))
    if [[ ! -f "$file" ]]; then
        printf "Missing file '$file'.\n"
        (( fail++ ))
    fi
done

doLog $fail "$TARGET_DIR: check files ("$(( all-fail ))"/$all)"
