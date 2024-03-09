# Use php:7.4-apache as the base image
FROM php:7.4-apache

# Install mysqli extension for PHP
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy the application source code to /var/www/html/
COPY . /var/www/html/

# Update database connection strings to point to a Kubernetes service named mysql-service
RUN sed -i 's/localhost/mysql-service/g' /var/www/html/index.php

# Expose port 80 to allow traffic to the web server
EXPOSE 80