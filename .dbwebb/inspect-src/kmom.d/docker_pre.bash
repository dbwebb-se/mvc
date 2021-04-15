#!/usr/bin/env bash
case $KMOM in
    kmom01 | \
    kmom02 | \
    kmom03)
        export TARGET_DIR="gui-repo"
    ;;
esac
