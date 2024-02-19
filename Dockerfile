FROM webdevops/php-nginx:8.2

COPY vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY laravel-worker.conf /opt/docker/etc/supervisor.d/laravel-worker.conf

COPY . /app

RUN chown -R www-data:www-data /app/storage/ && \
    chmod -R 777 /app/storage/

WORKDIR /app

RUN if [ ! -f .env ]; then cp .env.example .env; fi

EXPOSE 443 80

