FROM php:7-fpm
RUN apt-get update && \
    apt-get install git -y && \
    docker-php-ext-install pdo pdo_mysql && \
    curl -sS https://getcomposer.org/installer -o composer-setup.php && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer
