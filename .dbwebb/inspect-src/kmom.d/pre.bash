#!/usr/bin/env bash
#
# Script run BEFORE kmom specific scripts.
# Put tests here that applies to all kmoms.
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
#printf ">>> -------------- Pre (all kmoms) ----------------------\n"

function doOpenGitUrl {
    [[ -d "$DIR/$1" ]] || echo "MISSING TARGET DIR '$1'. Epic fail."
    [[ -d "$DIR/$1/.git" ]] || echo "MISSING TARGET GIT DIR '$1/.git'. Epic fail."

    gitUrl=$( cd "$DIR/$1" && [[ -d .git ]] && git config --get remote.origin.url )
    openGitUrl "$gitUrl"
    [[ $gitUrl ]] || echo "MISSING GIT REMOTE. Epic fail."
}

# Open log
echo "[$ACRONYM/$COURSE/$KMOM]" > "$LOG_DOCKER"

# Open Git remote
doOpenGitUrl "me/report"

case $KMOM in
    kmom01)
    ;;
    kmom02)
    ;;
    kmom03)
    ;;
    kmom04)
        openUrl "file://$( pwd )/me/report/docs/api/index.html"
        ;;
    kmom05)
    ;;
    kmom06)
    ;;
    kmom10)
    ;;
esac
