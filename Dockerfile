#stage 0
FROM php:7.4-fpm-alpine

WORKDIR /var/www/html/ci-sista

# Install system dependencies
RUN apk --update add \
    curl \
	openssl \
    libpng-dev \
    libxml2-dev \
	libzip-dev \
    curl-dev \
    oniguruma-dev

# Clear cache
RUN apk del gcc g++
RUN rm -rf /var/cache/apk/*

# Install PHP extensions
RUN docker-php-ext-install bcmath curl gd exif mbstring mysqli pdo pdo_mysql pcntl xml zip

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY ./ /var/www/html/ci-sista

# BELOM SUPPORT KIRIM EMAIL