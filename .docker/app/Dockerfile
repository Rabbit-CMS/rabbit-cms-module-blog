FROM php

RUN apt update && apt install -y \
    nano \
    curl \
    wget \
    zip unzip libzip-dev
RUN docker-php-ext-install zip
RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --filename=composer --install-dir=/bin
