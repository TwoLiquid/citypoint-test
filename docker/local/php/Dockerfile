FROM php:8.2-fpm

RUN apt-get -y update && apt-get upgrade -y \
    git \
    zlib1g-dev \
    libzip-dev \
    unzip \
    zip

RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

CMD ["php-fpm"]
