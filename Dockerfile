FROM php:8.0.2-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer