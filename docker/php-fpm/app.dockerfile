FROM php:7.2.10-fpm

WORKDIR "/var/www"

# replace shell with bash so we can source files
RUN rm /bin/sh && ln -s /bin/bash /bin/sh

RUN apt-get update && apt-get install -y mysql-client \
	libmagickwand-dev --no-install-recommends libmemcached-dev \
	libz-dev \
	libpq-dev \
	libssl-dev \
	libmcrypt-dev \
	libfreetype6-dev \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install bcmath bz2 calendar iconv mbstring mysqli opcache pdo_mysql zip xml \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd


# Install Composer.
ENV COMPOSER_HOME /root/composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
ENV PATH $COMPOSER_HOME/vendor/bin:$PATH

RUN apt-get install -my wget gnupg

