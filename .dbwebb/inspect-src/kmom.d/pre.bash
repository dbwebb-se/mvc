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
localRepoUrl="http://127.0.0.1:18080/gui-repo"
REPO="me/game"

[[ -d $REPO ]] || echo "MISSING TARGET DIR '$GAME'. Epic fail."
[[ -d $REPO/.git ]] || echo "MISSING TARGET GIT DIR '$GAME/.git'. Epic fail."

case $KMOM in
    kmom02)
        # Pseudocode & flowchart
        openUrl "$localRepoUrl/doc/yatzy"
    ;;

    kmom03)
        # Code coverage
        openUrl "$localRepoUrl/build/coverage/index.html"
    ;;

esac

openUrl "$localRepoUrl/htdocs"

studentServerUrl="$REDOVISA_HTTP_PREFIX/~$ACRONYM/dbwebb-kurser/$COURSE/$REPO/htdocs"
openUrl "$studentServerUrl"

gitUrl=$( cd $REPO && git config --get remote.origin.url )
openGitUrl "$gitUrl"
[[ $gitUrl ]] || echo "MISSING GIT REMOTE. Epic fail."


# # Rsync the target dir/repo to a temp space
# install -d gui-repo/
# rm -rf gui-repo/{*,.??*}
# rsync -a --delete $REPO/ gui-repo/
