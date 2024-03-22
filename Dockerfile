# Use the official PHP image with Apache as a parent image
FROM php:8.2-apache

# Install required PHP extensions
RUN apt-get update && \
    apt-get install -y libicu-dev && \
    docker-php-ext-install intl pdo pdo_mysql mysqli 
#	docker-php-ext-enable pdo_mysql && \
#   a2enmod rewrite
RUN a2enmod rewrite

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application files to the container
COPY ./app /var/www/html


# Change permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache
#CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"]