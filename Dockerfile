FROM php:8.0.2-fpm-alpine3.12

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apk --update add --no-cache \
    nginx \
    bash \
    && rm -rf /var/cache/apk/*

COPY /config/nginx /etc/nginx/http.d
COPY /config/docker /docker
COPY /application /application

RUN chmod -R 777 /docker

WORKDIR /application

EXPOSE 9001

ENTRYPOINT ["/bin/bash", "/docker/entrypoint.sh"]