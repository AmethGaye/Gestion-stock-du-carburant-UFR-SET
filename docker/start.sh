#!/bin/bash
set -e

# Remplacer le port Nginx par celui fourni par Railway
sed -i "s/RAILWAY_PORT/${PORT:-80}/g" /etc/nginx/conf.d/default.conf

# Optimiser Laravel pour la production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Migrations + seeders au premier démarrage
php artisan migrate --seed --force

# Démarrer PHP-FPM en arrière-plan
php-fpm -D

# Démarrer Nginx au premier plan (process principal)
exec nginx -g "daemon off;"
