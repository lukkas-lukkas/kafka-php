FROM php:8.0.2-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apk --update add --no-cache \
    ${PHPIZE_DEPS} \
    curl \
    zip \
    nginx \
    bash \
    git \
    librdkafka-dev \
    && rm -rf /var/cache/apk/* \
    && mkdir /run/nginx

RUN docker-php-ext-install \
        pdo

# Kafka
ENV PECL_RBKAFKA_VERSION='5.0.0'
ENV LIB_RDKAFKA_VERSION='v1.6.1'

RUN git clone --depth 1 --branch ${LIB_RDKAFKA_VERSION} https://github.com/edenhill/librdkafka.git \
    && cd librdkafka \
    && ./configure \
    && make \
    && make install \
    && pecl install rdkafka-${PECL_RBKAFKA_VERSION} \
    && docker-php-ext-enable rdkafka

COPY /config/nginx /etc/nginx/http.d
COPY /config/docker /docker
COPY /application /application

RUN chmod -R 777 /docker

WORKDIR /application

EXPOSE 9001

ENTRYPOINT ["/bin/bash", "/docker/entrypoint.sh"]