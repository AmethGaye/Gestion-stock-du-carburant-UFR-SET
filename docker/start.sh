#!/bin/sh
echo "==> Migration..."
php artisan migrate:fresh --seed --force

echo "==> Démarrage serveur sur port ${PORT:-8000}..."
exec php artisan serve --host=0.0.0.0 --port="${PORT:-8000}"
