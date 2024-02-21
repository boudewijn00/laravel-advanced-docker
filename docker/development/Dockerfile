FROM webdevops/php-nginx:8.2

COPY ../.. /app

WORKDIR /app

COPY /docker/vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY /docker/laravel-worker.conf /opt/docker/etc/supervisor.d/laravel-worker.conf

RUN chown -R www-data:www-data /app/storage/ && \
    chmod -R 777 /app/storage/

EXPOSE 443 80

