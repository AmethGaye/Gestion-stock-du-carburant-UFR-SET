FROM php:8.2-cli

# Dépendances système
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Node.js 20 (pour Vite/Tailwind)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www

COPY . .

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Installer les dépendances JS et builder les assets
RUN npm ci && npm run build

# Permissions Laravel
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 8000

CMD php artisan migrate --seed --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}
