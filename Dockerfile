# Dockerfile
FROM php:8.4-fpm

# Installation des dépendances système nécessaires pour les extensions PHP
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libmagickwand-dev \
    libicu-dev \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# 1. L'extension OBLIGATOIRE pour la base de données
RUN docker-php-ext-install mysqli pdo_mysql

# 2. Les extensions RECOMMANDÉES pour WordPress (Images, Zip, Sécurité, Internationalisation)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd exif zip intl bcmath opcache

# 3. Optionnel : Imagick (très recommandé pour la gestion avancée des images sur WP)
RUN pecl install imagick && docker-php-ext-enable imagick || echo "Imagick non installé, on continue"