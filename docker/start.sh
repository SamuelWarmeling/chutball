#!/bin/sh
set -eu

cd /var/www/html

APP_PORT="${PORT:-10000}"
sed -ri "s/Listen 80/Listen ${APP_PORT}/g" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \\*:80>/<VirtualHost *:${APP_PORT}>/g" /etc/apache2/sites-available/000-default.conf

if [ -n "${DB_HOST:-}" ]; then
  echo "Waiting for MySQL at ${DB_HOST}:${DB_PORT:-3306}..."
  attempts=0
  until php -r '
    $host = getenv("DB_HOST") ?: "127.0.0.1";
    $port = getenv("DB_PORT") ?: "3306";
    $database = getenv("DB_DATABASE") ?: "";
    $username = getenv("DB_USERNAME") ?: "root";
    $password = getenv("DB_PASSWORD") ?: "";
    try {
        new PDO(
            "mysql:host={$host};port={$port};dbname={$database}",
            $username,
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_TIMEOUT => 5]
        );
        exit(0);
    } catch (Throwable $exception) {
        fwrite(STDERR, $exception->getMessage() . PHP_EOL);
        exit(1);
    }
  '; do
    attempts=$((attempts + 1))
    if [ "${attempts}" -ge 30 ]; then
      echo "MySQL did not become available in time. Starting app without blocking deploy."
      break
    fi
    sleep 2
  done
fi

php artisan storage:link || true
php artisan migrate --force || true
php artisan db:seed --force || true

exec apache2-foreground
