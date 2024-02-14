FROM webdevops/php-nginx:8.2

COPY vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY laravel-worker.conf /opt/docker/etc/supervisor.d/laravel-worker.conf

COPY . /app

WORKDIR /app

RUN chown -R www-data:www-data /app/storage/ && \
    chmod -R 755 /app/storage/logs

#if .env not exists copy .env.example to .env
RUN if [ ! -f .env ]; then cp .env.example .env; fi

RUN composer install --no-dev --no-interaction --optimize-autoloader
RUN php artisan migrate --force



EXPOSE 443 80

