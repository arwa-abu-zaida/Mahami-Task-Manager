FROM php:8.3-cli

RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip curl libsqlite3-dev libzip-dev \
    && docker-php-ext-install pdo_sqlite zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Create a clean Laravel 12 application and install Livewire.
RUN composer create-project laravel/laravel . "^12.0" --no-interaction \
    && composer require livewire/livewire "^3.6" --no-interaction

# Copy this assignment's application code over the Laravel skeleton.
COPY src/ ./

RUN mkdir -p storage/framework/{cache,sessions,views} storage/logs bootstrap/cache \
    && touch database/database.sqlite \
    && chown -R www-data:www-data storage bootstrap/cache database

COPY docker/entrypoint.sh /usr/local/bin/mahami-entrypoint
RUN chmod +x /usr/local/bin/mahami-entrypoint

EXPOSE 8000
HEALTHCHECK --interval=30s --timeout=5s --start-period=30s --retries=3 \
    CMD curl -fsS http://127.0.0.1:8000/health || exit 1

ENTRYPOINT ["mahami-entrypoint"]
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
