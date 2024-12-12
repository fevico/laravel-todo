#!/usr/bin/env bash
# echo "Running composer"
# composer global require hirak/prestissimo
# composer install --no-dev --working-dir=/var/www/html

# echo "generating application key..."
# php artisan key:generate --show

# echo "Caching config..."
# php artisan config:cache

# echo "Caching routes..."
# php artisan route:cache

# echo "Running migrations..."
# php artisan migrate --force

FROM richarvey/nginx-php-fpm:1.7.2

# Copy application code
COPY . /var/www/html

# Install dependencies and configure Laravel
RUN chmod +x /var/www/html/laravel-deploy.sh && /var/www/html/laravel-deploy.sh

# Set environment variables
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]

