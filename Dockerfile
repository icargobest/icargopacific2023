FROM php:8.2-fpm-alpine

RUN apk add --no-cache nginx wget libpng-dev libzip-dev
RUN docker-php-ext-install gd bcmath zip

RUN mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /app
WORKDIR /app
COPY . .

RUN wget https://getcomposer.org/composer-stable.phar -O /usr/local/bin/composer && chmod +x /usr/local/bin/composer
RUN composer install --no-dev --ignore-platform-reqs

RUN chown -R www-data: /app

CMD sh /app/docker/startup.sh
