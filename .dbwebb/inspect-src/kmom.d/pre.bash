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

# Open log
echo "[$ACRONYM]" > "$LOG_DOCKER"

# Open me/redovisa
url="$REDOVISA_HTTP_PREFIX/~$ACRONYM/dbwebb-kurser/$COURSE/$REDOVISA_HTTP_POSTFIX/htdocs"
openUrl "$url"

# Code coverage
openUrl "file://$DIR/me/redovisa/build/coverage/index.html"

# Open github
url=$( cd me/redovisa && git config --get remote.origin.url )
openGitUrl "$url"

# Do different things depending on kmom
case $KMOM in
    kmom04)
        if [[ -d $DIR/me/module ]]; then
            openUrl "file://$DIR/me/module/build/coverage/index.html"
            url=$( cd me/module && git config --get remote.origin.url )
            openGitUrl "$url"
        fi
        ;;
    kmom03)
    ;;
    kmom10)
    ;;
esac
