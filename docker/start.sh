#!/bin/bash

# Remplacer le port Nginx par celui fourni par Railway (défaut 80)
PORT=${PORT:-80}
sed -i "s/RAILWAY_PORT/${PORT}/g" /etc/nginx/conf.d/default.conf

# Optimiser Laravel pour la production
php artisan config:cache  || true
php artisan route:cache   || true
php artisan view:cache    || true

# Migrations + seeders (non bloquant si la DB n'est pas encore prête)
php artisan migrate --seed --force || echo "[WARNING] migrate:seed failed, skipping"

# Démarrer PHP-FPM en arrière-plan
php-fpm -D

# Attendre que PHP-FPM soit prêt
sleep 1

# Démarrer Nginx au premier plan (process principal du container)
exec nginx -g "daemon off;"
