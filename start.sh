#!/bin/bash

cd /app

if [[ ! -d "/app/vendor" ]];
then
composer install
composer dump-autoload -o
fi

cp .env.example .env
php artisan key:generate
