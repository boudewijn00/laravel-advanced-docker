FROM webdevops/php-nginx:8.2

# copy all the files from two directories up to the /app directory
COPY ../../ /app

WORKDIR /app

COPY /docker/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY /docker/laravel-worker.conf /opt/docker/etc/supervisor.d/laravel-worker.conf

RUN chown -R www-data:www-data /app/storage/ && \
    chmod -R 777 /app/storage/

COPY .env.production .env

RUN composer install --no-dev --no-interaction --no-progress --no-suggest --optimize-autoloader

EXPOSE 443 80

