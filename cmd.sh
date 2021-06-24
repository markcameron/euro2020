#!/bin/sh

php artisan migrate
php artisan fd:matches

rr serve -c ./.rr.yaml
