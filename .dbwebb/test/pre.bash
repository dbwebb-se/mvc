#!/usr/bin/env bash
case $TESTSUITE in
    kmom01 | \
    kmom02 | \
    kmom03)
        export TARGET_DIR="me/game"
    ;;
esac
