#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

cd $TARGET_DIR || exit 1
[[ ! -d .git ]] && echo "Missing .git directory." && exit 1

#echo "[Git] stash and then status to remove not committed stuff"
git stash >& /dev/null
git status >& /dev/null

lowtag="3.0.0"
hightag="4.0.0"
tag=$( hasGitTagBetween . $lowtag $hightag )
mainBranch=$( getMainOrMasterBranch . )

status=0
if [[ $tag ]]; then
    git checkout tags/$tag &> /dev/null
    #echo "[Git] checked out tag=$tag"
else
    tag="no tag, using branch $mainBranch"
    status=2
fi

echo "[$ACRONYM] using tag = $tag"
doLog $status "using tag = '$tag'" 1
