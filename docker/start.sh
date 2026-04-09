#!/bin/sh
set -eu

cd /var/www/html

APP_PORT="${PORT:-10000}"
sed -ri "s/Listen 80/Listen ${APP_PORT}/g" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \\*:80>/<VirtualHost *:${APP_PORT}>/g" /etc/apache2/sites-available/000-default.conf

if [ -n "${DB_HOST:-}" ]; then
  echo "Waiting for MySQL at ${DB_HOST}:${DB_PORT:-3306}..."
  attempts=0
  until mysqladmin ping \
    -h"${DB_HOST}" \
    -P"${DB_PORT:-3306}" \
    -u"${DB_USERNAME:-root}" \
    ${DB_PASSWORD:+-p"${DB_PASSWORD}"} \
    --silent; do
    attempts=$((attempts + 1))
    if [ "${attempts}" -ge 60 ]; then
      echo "MySQL did not become available in time."
      exit 1
    fi
    sleep 2
  done
fi

php artisan storage:link || true
php artisan migrate --force

exec apache2-foreground
