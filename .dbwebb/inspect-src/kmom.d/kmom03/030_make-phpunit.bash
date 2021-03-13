#!/usr/bin/env bash
. ".dbwebb/inspect-src/kmom.d/functions.bash"

cd me/redovisa || exit

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
