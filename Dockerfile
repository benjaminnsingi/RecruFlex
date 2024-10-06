FROM php:8.3-apache

# Installer les dépendances nécessaires pour Symfony et MySQL
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Activer mod_rewrite pour Symfony
RUN a2enmod rewrite

# Définir le répertoire de travail
WORKDIR /var/www/html

# Installer Symfony dans le répertoire principal
RUN composer create-project symfony/skeleton:"6.4.*" .

# Exposer le port 80
EXPOSE 80
