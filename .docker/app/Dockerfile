FROM php

RUN apt update && apt install -y \
    nano \
    curl \
    wget

RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --filename=composer --install-dir=/bin
