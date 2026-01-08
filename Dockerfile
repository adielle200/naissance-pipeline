FROM php:8.2-apache

# Extensions PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copier le projet
COPY . /var/www/html/

# Droits corrects
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Autoriser l'accès Apache
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Activer mod_rewrite
RUN a2enmod rewrite

EXPOSE 80

