FROM php:8.0.0-fpm-alpine3.12

COPY --from=composer /usr/bin/composer /usr/bin/composer