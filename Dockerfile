FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libpq-dev libonig-dev libzip-dev zip

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql mbstring zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
WORKDIR /app
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Laravel optimization
RUN php artisan config:clear || true
RUN php artisan cache:clear || true

EXPOSE 10000
CMD php artisan serve --host=0.0.0.0 --port=10000