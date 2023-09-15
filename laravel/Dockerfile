FROM  php:8.1.0-apache
WORKDIR /var/www/html

RUN a2enmod rewrite


RUN apt-get update && apt-get install -y \
    libzip-dev \
    libmariadb-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


RUN docker-php-ext-install gettext intl pdo_mysql gd

RUN docker-php-ext-configure gd  --enable-gd  --with-freetype --with-jpeg && docker-php-ext-install -j$(nproc) gd
