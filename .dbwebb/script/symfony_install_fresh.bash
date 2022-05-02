#!/usr/bin/env bash

if [[ -d symfony/app ]]; then
    printf "There is already a me/symfony/app/ dir, remove it first?\n"
    exit 2
fi

mkdir me/symfony
cp example/docker/docker-compose.yaml me/symfony

cd me/symfony
docker-compose run php81 composer create-project symfony/website-skeleton app

# cd app
#composer require annotations
#composer require twig
# cp ../../example/docker-compose.yaml app


#rm -f me/report/{docker-compose.override.yml,docker-compose.yml}
#
# chmod -R 777 var
# docker-compose up php81-apache

#dbwebb publishpure report
