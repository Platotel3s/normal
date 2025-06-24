FROM php:8.4-fpm

#install dependenciesnya dulu
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip curl \
    libpng-dev libjpeg-dev libfreetype6-dev \
    git nano \
    && docker-php-ext-install zip pdo pdo_mysql

#install composernya
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
COPY . .
RUN composer install
CMD ["php-fpm"]
