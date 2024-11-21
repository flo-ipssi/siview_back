FROM php:8.2-fpm

# PHP Dependencies
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    ca-certificates \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql zip \
    && update-ca-certificates

# Composer installation
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Dependencies installation
RUN composer install --optimize-autoloader

# Permissions if necessary
# RUN chown -R www-data:www-data /var/www/html