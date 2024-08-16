FROM php:8.3-fpm

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /var/www

RUN apt-get update \
    && apt-get install -y \
    $PHPIZE_DEPS \
    bash \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libicu-dev \
    libpng-dev \
    libpq-dev \
    libzip-dev \
    postgresql \
    zip

RUN pecl install -f xdebug pcov && \
    docker-php-ext-enable xdebug

RUN docker-php-ext-configure intl
RUN docker-php-ext-install \
    intl \
    opcache

# Install GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd


# Install zip
RUN docker-php-ext-install zip

# Install PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql

