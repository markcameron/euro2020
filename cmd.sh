#!/bin/sh

php artisan migrate --force -n
php artisan fd:matches

rr serve -c ./.rr.yaml
