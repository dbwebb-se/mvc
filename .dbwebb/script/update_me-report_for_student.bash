#!/usr/bin/env bash

if (($# != 1)); then
    printf "%s <acronym>\n" "$( basename $0 )"
    exit 2
fi
acronym=$1

dbwebb -f -y download report $acronym

cp example/symfony/docker-compose.yaml me/report
rm -f me/report/{docker-compose.override.yml,docker-compose.yml}
#
cd me/report
# chmod -R 777 var
docker-compose run php81 composer install
# docker-compose up php81-apache

dbwebb publishpure report
