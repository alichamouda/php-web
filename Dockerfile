FROM php:7.1.2-apache
RUN /usr/local/bin/docker-php-ext-install pdo pdo_mysql