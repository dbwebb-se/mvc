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
echo "[$ACRONYM/$COURSE/$KMOM]" > "$LOG_DOCKER"

# Do different things depending on kmom
case $KMOM in
    kmom01)
        # Local version with the correct tag
        openUrl "http://127.0.0.1:18080/gui-repo/htdocs"

        # Open repo at student server
        REPO="me/game"
        url="$REDOVISA_HTTP_PREFIX/~$ACRONYM/dbwebb-kurser/$COURSE/$REPO/htdocs"
        openUrl "$url"

        # Code coverage
        #openUrl "file://$DIR/me/redovisa/build/coverage/index.html"

        # Open github
        url=$( cd $REPO && git config --get remote.origin.url )
        openGitUrl "$url"
    ;;

    kmom02)
        # Local version with the correct tag
        openUrl "http://127.0.0.1:18080/gui-repo/htdocs"

        # Open repo at student server
        REPO="me/game"
        url="$REDOVISA_HTTP_PREFIX/~$ACRONYM/dbwebb-kurser/$COURSE/$REPO/htdocs"
        openUrl "$url"

        # Code coverage
        #openUrl "file://$DIR/me/redovisa/build/coverage/index.html"

        # Open github
        url=$( cd $REPO && git config --get remote.origin.url )
        openGitUrl "$url"

        # Pseudocode & flowchart
        openUrl "http://127.0.0.1:18080/gui-repo/doc/yatzy"
    ;;

    kmom03)
        # Local version with the correct tag
        openUrl "http://127.0.0.1:18080/gui-repo/htdocs"

        # Open repo at student server
        REPO="me/game"
        url="$REDOVISA_HTTP_PREFIX/~$ACRONYM/dbwebb-kurser/$COURSE/$REPO/htdocs"
        openUrl "$url"

        # Code coverage
        openUrl "http://127.0.0.1:18080/gui-repo/build/coverage/index.html"

        # Open github
        url=$( cd $REPO && git config --get remote.origin.url )
        openGitUrl "$url"
    ;;

esac

# Open me/redovisa
#url="$REDOVISA_HTTP_PREFIX/~$ACRONYM/dbwebb-kurser/$COURSE/$REDOVISA_HTTP_POSTFIX/htdocs"
#openUrl "$url"

# Code coverage
#openUrl "file://$DIR/me/redovisa/build/coverage/index.html"

# Open github
#url=$( cd me/redovisa && git config --get remote.origin.url )
#openGitUrl "$url"
