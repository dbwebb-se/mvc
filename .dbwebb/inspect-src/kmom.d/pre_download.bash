#!/usr/bin/env bash
#
# Script run BEFORE download happens.
# Put tests here that can be done without downloading the files.
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
studentServerUrl="$REDOVISA_HTTP_PREFIX/~$ACRONYM/dbwebb-kurser/$COURSE/me"
openUrl "$studentServerUrl/report/public/report#$KMOM"

# Will not work on cygwin
#sudo rm -rf me/report/build

case $KMOM in
    kmom01)
        openUrl "$studentServerUrl/report/public/about"
        openUrl "$studentServerUrl/report/public/lucky"
        openUrl "$studentServerUrl/report/public/api/quote"
    ;;
    kmom02)
        openUrl "$studentServerUrl/report/public/"
        openUrl "$studentServerUrl/report/public/api"
        openUrl "$studentServerUrl/report/public/card"
    ;;
    kmom03)
        openUrl "$studentServerUrl/report/public/game/"
        openUrl "$studentServerUrl/report/public/game/doc/"
        openUrl "$studentServerUrl/report/public/api"
    ;;
    kmom04)
        openUrl "$studentServerUrl/report/public/"
        openUrl "$studentServerUrl/report/docs/api/"
        openUrl "$studentServerUrl/report/docs/coverage/"
    ;;
    kmom05)
        openUrl "$studentServerUrl/report/public/library"
        openUrl "$studentServerUrl/report/public/api"
        openUrl "$studentServerUrl/report/docs/api/"
        openUrl "$studentServerUrl/report/docs/coverage/"
    ;;
    kmom06)
        openUrl "$studentServerUrl/report/public/metrics"
        openUrl "$studentServerUrl/report/docs/api/"
        openUrl "$studentServerUrl/report/docs/coverage/"
        openUrl "$studentServerUrl/report/docs/metrics/"
    ;;
    kmom10)
        openUrl "$studentServerUrl/report/public/proj"
        openUrl "$studentServerUrl/report/public/proj/about"
        openUrl "$studentServerUrl/report/docs/api/"
        openUrl "$studentServerUrl/report/docs/coverage/"
        openUrl "$studentServerUrl/report/docs/metrics/"
        ;;
esac
