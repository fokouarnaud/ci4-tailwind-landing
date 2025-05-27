#!/bin/bash

# Script de démarrage pour Railway/Production
set -e

echo "🚀 Starting CI4 + Tailwind Template..."

# Configuration des variables d'environnement Railway
export APACHE_RUN_USER=www-data
export APACHE_RUN_GROUP=www-data
export APACHE_LOG_DIR=/var/log/apache2
export APACHE_LOCK_DIR=/var/lock/apache2
export APACHE_PID_FILE=/var/run/apache2/apache2.pid

# Création des répertoires nécessaires
mkdir -p $APACHE_LOG_DIR $APACHE_LOCK_DIR
mkdir -p /var/run/apache2

# Configuration dynamique du port (Railway)
if [ ! -z "$PORT" ]; then
    echo "📡 Configuring Apache for port $PORT"
    sed -i "s/Listen 80/Listen $PORT/g" /etc/apache2/ports.conf
    sed -i "s/:80/:$PORT/g" /etc/apache2/sites-available/000-default.conf
fi

# Vérification de la configuration Apache
echo "🔧 Testing Apache configuration..."
apache2ctl configtest

# Vérification des permissions writable
echo "📁 Checking writable permissions..."
if [ ! -w "/var/www/html/writable" ]; then
    echo "⚠️ Fixing writable permissions..."
    chmod -R 777 /var/www/html/writable
fi

# Vérification de la base de données (optionnel)
if [ ! -z "$DATABASE_URL" ]; then
    echo "🗄️ Database URL detected: ${DATABASE_URL:0:20}..."
fi

# Log du démarrage
echo "✅ CI4 Template ready on port ${PORT:-80}"
echo "📊 Environment: $CI_ENVIRONMENT"
echo "🌐 Document Root: $APACHE_DOCUMENT_ROOT"

# Démarrage d'Apache en foreground
echo "🎯 Starting Apache..."
exec apache2-foreground
