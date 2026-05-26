#!/bin/bash

# Remplacer le port Nginx par celui fourni par Railway (défaut 80)
PORT=${PORT:-80}
sed -i "s/RAILWAY_PORT/${PORT}/g" /etc/nginx/conf.d/default.conf

# Attendre que MySQL soit accessible (max 60 secondes)
echo "Attente de la base de données..."
for i in $(seq 1 30); do
    php -r "
        try {
            new PDO(
                'mysql:host=' . getenv('DB_HOST') . ';port=' . (getenv('DB_PORT') ?: 3306),
                getenv('DB_USERNAME'),
                getenv('DB_PASSWORD')
            );
            exit(0);
        } catch (Exception \$e) { exit(1); }
    " && echo "Base de données prête." && break
    echo "  tentative $i/30, nouvelle tentative dans 2s..."
    sleep 2
done

# Migrations + seeders
echo "Lancement des migrations..."
php artisan migrate:fresh --seed --force
echo "Migrations terminées."

# Optimiser Laravel pour la production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Démarrer PHP-FPM en arrière-plan
php-fpm -D
sleep 1

# Démarrer Nginx au premier plan
exec nginx -g "daemon off;"
