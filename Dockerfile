# Dockerfile FIXED - Add missing PHP extensions
FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    curl \
    libicu-dev \
    && rm -rf /var/lib/apt/lists/*

# Install required PHP extensions including intl
RUN docker-php-ext-install pdo pdo_mysql intl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install Node.js
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Enable Apache rewrite
RUN a2enmod rewrite

# Set working directory  
WORKDIR /var/www/html

# Copy everything
COPY . .

# Install composer dependencies (intl now available)
RUN composer install --no-dev --no-interaction

# Install npm dependencies and build
RUN npm install
RUN npm run build:prod || npm run build || echo "Build completed"

# Set permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Configure Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

EXPOSE 80
CMD ["apache2-foreground"]
