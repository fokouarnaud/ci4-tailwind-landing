# CodeIgniter 4 + Tailwind CSS - Production Ready
FROM php:8.1-apache

# Informations du maintainer
LABEL maintainer="Cedric <cedric@example.com>"
LABEL description="CI4 Template with Tailwind CSS - Railway Deployment"

# Variables d'environnement
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
ENV CI_ENVIRONMENT=production
ENV COMPOSER_ALLOW_SUPERUSER=1

# Installation des dépendances système
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    libsqlite3-dev \
    zip \
    unzip \
    nodejs \
    npm \
    && rm -rf /var/lib/apt/lists/*

# Installation des extensions PHP
RUN docker-php-ext-configure gd \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        pdo_sqlite \
        mbstring \
        exif \
        pcntl \
        bcmath \
        gd \
        zip \
        intl

# Installation de Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configuration Apache pour CodeIgniter 4
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Activation des modules Apache nécessaires
RUN a2enmod rewrite headers env

# Configuration Apache optimisée
RUN echo '<Directory ${APACHE_DOCUMENT_ROOT}>\n\
    Options -Indexes +FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
    \n\
    # Security headers\n\
    Header always set X-Content-Type-Options nosniff\n\
    Header always set X-Frame-Options DENY\n\
    Header always set X-XSS-Protection "1; mode=block"\n\
    Header always set Referrer-Policy "strict-origin-when-cross-origin"\n\
    \n\
    # Compression\n\
    <IfModule mod_deflate.c>\n\
        AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript application/json\n\
    </IfModule>\n\
    \n\
    # Caching\n\
    <IfModule mod_expires.c>\n\
        ExpiresActive On\n\
        ExpiresByType text/css "access plus 1 year"\n\
        ExpiresByType application/javascript "access plus 1 year"\n\
        ExpiresByType image/png "access plus 1 year"\n\
        ExpiresByType image/jpg "access plus 1 year"\n\
        ExpiresByType image/jpeg "access plus 1 year"\n\
        ExpiresByType image/gif "access plus 1 year"\n\
        ExpiresByType image/svg+xml "access plus 1 year"\n\
    </IfModule>\n\
</Directory>' > /etc/apache2/sites-available/000-default.conf

# Répertoire de travail
WORKDIR /var/www/html

# Copie des fichiers de configuration d'abord (pour cache Docker)
COPY composer.json composer.lock package.json package-lock.json ./

# Installation des dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Installation des dépendances Node.js
RUN npm ci --only=production

# Copie du code source
COPY . .

# Build des assets (Vite + Tailwind)
RUN npm run build:prod

# Nettoyage des fichiers de développement
RUN rm -rf node_modules resources/css resources/js .env.example \
    && npm cache clean --force

# Configuration des permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 777 /var/www/html/writable

# Création du répertoire de logs pour Railway
RUN mkdir -p /var/www/html/writable/logs \
    && touch /var/www/html/writable/logs/log-$(date +%Y-%m-%d).log \
    && chown -R www-data:www-data /var/www/html/writable/logs

# Configuration santé check
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
    CMD curl -f http://localhost/ || exit 1

# Exposition du port
EXPOSE 80

# Script de démarrage
COPY docker/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh

# Commande de démarrage
CMD ["/usr/local/bin/start.sh"]
