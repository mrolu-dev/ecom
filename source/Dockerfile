# Use php:7.4-apache as the base image
FROM php:7.4-apache

# Define Environmental variables
ENV DB_HOST=mysql-service
ENV DB_PASSWORD=ecompassword
ENV DB_USER=ecomuser
ENV DB_NAME=ecomdb

# Install mysqli extension for PHP
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Create directory for initialization scripts
RUN mkdir -p /docker-entrypoint-initdb.d/

# Grant permission of the database to the user ecomdb
RUN echo "GRANT ALL PRIVILEGES ON ${DB_NAME}.* TO '${DB_USER}'@'%' IDENTIFIED BY '${DB_PASSWORD}';" > /docker-entrypoint-initdb.d/grant.sql

# Redirect Apache logs to stdout/stderr
RUN ln -sf /dev/stdout /var/log/apache2/access.log && ln -sf /dev/stderr /var/log/apache2/error.log

# Copy the application source code to /var/www/html/
COPY . /var/www/html/

# Update database connection strings to point to a Kubernetes service named mysql-service
RUN sed -i 's/localhost/mysql-service/g' /var/www/html/index.php

# Expose port 80 to allow traffic to the web server
EXPOSE 80
