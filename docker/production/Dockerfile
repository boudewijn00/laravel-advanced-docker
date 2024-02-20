FROM webdevops/php-nginx:8.2

# copy all the files from two directories up to the /app directory
COPY ../../ /app

WORKDIR /app

COPY /docker/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY /docker/laravel-worker.conf /opt/docker/etc/supervisor.d/laravel-worker.conf

RUN chown -R www-data:www-data /app/storage/ && \
    chmod -R 777 /app/storage/

RUN if [ ! -f .env ]; then cp .env.example .env; fi

RUN composer install --no-dev --no-interaction --no-progress --no-suggest --optimize-autoloader

RUN php artisan key:generate && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

EXPOSE 443 80

