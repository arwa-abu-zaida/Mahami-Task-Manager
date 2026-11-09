#!/bin/sh
set -e

cd /var/www/html

if [ ! -f .env ]; then
    cp .env.example .env
fi

if [ -z "${APP_KEY:-}" ]; then
    php artisan key:generate --force
fi

mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache
touch database/database.sqlite
php artisan migrate --force

exec "$@"
