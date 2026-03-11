#!/bin/sh
set -e

echo "Waiting for database..."
until php -r "new PDO('mysql:host=mysql;dbname=health_db', 'health_user', 'secret');" 2>/dev/null; do
  sleep 2
done

echo "Running migrations..."
php artisan migrate --force

echo "Starting Laravel server on 0.0.0.0:8080..."
exec php artisan serve --host=0.0.0.0 --port=8080