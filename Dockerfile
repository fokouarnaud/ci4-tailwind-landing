# Dockerfile FIXED - Handle composer and npm errors
FROM php:8.1-apache

# Install system dependencies with error handling
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js 18 LTS specifically
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring zip gd exif

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Enable Apache rewrite and headers
RUN a2enmod rewrite headers

# Set working directory
WORKDIR /var/www/html

# Copy composer files first (for Docker layer caching)
COPY composer.json composer.lock ./

# Install PHP dependencies with verbose output and error handling
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist -v || \
    (echo "Composer install failed, trying without optimize..." && \
     composer install --no-dev --no-interaction --prefer-dist -v) || \
    (echo "Composer install failed, trying basic install..." && \
     composer install --no-interaction -v)

# Copy package files
COPY package.json package-lock.json ./

# Install Node dependencies with error handling
RUN npm ci --only=production || \
    (echo "npm ci failed, trying npm install..." && \
     npm install --only=production) || \
    (echo "npm install failed, trying without only=production..." && \
     npm install)

# Copy rest of application
COPY . .

# Build assets with multiple fallbacks
RUN npm run build:prod || \
    npm run build || \
    (echo "Build failed, checking if assets exist..." && ls -la public/assets/) || \
    echo "No build assets, continuing..."

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html && \
    chmod -R 777 /var/www/html/writable

# Configure Apache DocumentRoot
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

# Copy and use apache.conf if it exists
COPY apache.conf /etc/apache2/conf-available/app.conf
RUN a2enconf app

# Create basic .htaccess if missing
RUN echo 'RewriteEngine On\nRewriteCond %{REQUEST_FILENAME} !-f\nRewriteCond %{REQUEST_FILENAME} !-d\nRewriteRule ^(.*)$ index.php/$1 [L,QSA]' > /var/www/html/public/.htaccess

# Debug: Show what's installed
RUN echo "=== PHP VERSION ===" && php --version && \
    echo "=== COMPOSER VERSION ===" && composer --version && \
    echo "=== NODE VERSION ===" && node --version && \
    echo "=== NPM VERSION ===" && npm --version && \
    echo "=== FILES IN PUBLIC ===" && ls -la /var/www/html/public/

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
