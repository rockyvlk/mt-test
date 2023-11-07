FROM php:8.2-cli

RUN mv $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY ./docker/php/conf.d /usr/local/etc/php/conf.d

### PHP extensions ###
RUN apt-get update && apt-get install -y libzip-dev\
    # Other
    && docker-php-ext-install zip
### PHP extensions ###

### Composer install ###
ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet
### Composer install ###

WORKDIR /app

