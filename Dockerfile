FROM webdevops/php-nginx:8.2

COPY vhost.conf /opt/docker/etc/nginx/vhost.conf
COPY . /app
RUN chown -R www-data:www-data /app/storage/ && \
    chmod -R 777 /app/storage/

WORKDIR /app

COPY .env.example .env

RUN composer install --optimize-autoloader;
RUN php artisan key:generate;

EXPOSE 443 80
