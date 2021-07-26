FROM php:8.0.3-apache

RUN chown -R www-data:www-data /var/www

RUN apt-get update \
    && apt-get install -y --no-install-recommends locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev \
    && echo "en_US.UTF-8 UTF-8" > /etc/locale.gen \
    && echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen \
    && locale-gen \
    && a2enmod rewrite \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pdo pdo_mysql gd opcache intl zip calendar dom mbstring zip gd xsl \
    && pecl install apcu && docker-php-ext-enable apcu \
    && pecl install xdebug && docker-php-ext-enable xdebug

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./start_symfony /usr/local/bin
RUN a2enmod rewrite

CMD ["start_symfony"]