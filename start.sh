#!/bin/sh

./vendor/bin/sail up -d
php artisan optimize
php artisan config:cache
php artisan migrate --force
php artisan db:seed
