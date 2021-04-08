#!/usr/bin/env bash
. ".dbwebb/test/functions.bash"

echo $COURSE_REPO_BASE
echo $ACRONYM
echo $PATH_TO_TARGET
echo $TARGET
echo $TESTSUITE

cd "$PATH_TO_TARGET" || exit


lowtag="1.0.0"
hightag="99.0.0"
tag=$( hasGitTagBetween . $lowtag $hightag )
mainBranch=$( getMainOrMasterBranch . )
restore=

if [[ $tag ]]; then
    git checkout tags/$tag &> /dev/null
    echo "[Git] checked out tags/$tag"
    restore=1
else
    tag="no tag, using branch $mainBranch"
fi

echo "[$ACRONYM] using tag = $tag"

make phpunit
status=$?

if (( $restore )); then
    git checkout "$( getMainOrMasterBranch . )" &> /dev/null
    echo "[Git] checked out $( getMainOrMasterBranch . )"
fi

doLog $status "make phpunit ($tag)"
