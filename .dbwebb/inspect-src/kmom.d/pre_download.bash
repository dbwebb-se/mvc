#!/usr/bin/env bash
#
# Script run BEFORE download happens.
# Put tests here that can be downe without downloading the files.
#
# Available (and usable) data:
#   $COURSE
#   $KMOM
#   $ACRONYM
#   $REDOVISA_HTTP_PREFIX
#   $REDOVISA_HTTP_POSTFIX
#   $LOG_DOCKER
#   eval "$BROWSER" "$url" &
#   openUrl "$url"
#   openSpecificUrl "$DIR" "me/redovisa" "build/coverage/index.html"
#
#printf ">>> -------------- Pre download (all kmoms) ----------------------\n"

# Open the student home page
studentServerUrl="$REDOVISA_HTTP_PREFIX/~$ACRONYM/dbwebb-kurser/$COURSE/me/report/public"
openUrl "$studentServerUrl/public/report#$KMOM"

# Will not work on cygwin
#sudo rm -rf me/report/build

case $KMOM in
    kmom01)
        openUrl "$studentServerUrl/public/"
        openUrl "$studentServerUrl/public/about"
        openUrl "$studentServerUrl/public/lucky"
        openUrl "$studentServerUrl/public/api/quote"
    ;;
    kmom02)
        openUrl "$studentServerUrl/public/"
        openUrl "$studentServerUrl/public/api"
        openUrl "$studentServerUrl/public/card"
    ;;
    kmom03)
        openUrl "$studentServerUrl/public/"
        openUrl "$studentServerUrl/public/game/"
        openUrl "$studentServerUrl/public/game/doc/"
        openUrl "$studentServerUrl/public/api"
    ;;
    kmom04)
        openUrl "$studentServerUrl/public/"
        openUrl "$studentServerUrl/docs/api/"
        openUrl "$studentServerUrl/docs/coverage/"
    ;;
    kmom05)
    ;;
    kmom06)
    ;;
    kmom10)
        openUrl "$studentServerUrl/proj"
        ;;
esac
