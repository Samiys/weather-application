# Use an official PHP image
FROM php:8.3-cli

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the source code to the container
COPY ./backend /var/www/html

# Install Composer and necessary tools
RUN apt-get update && \
    apt-get install -y git zip unzip curl && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies using Composer (this includes PHPUnit)
RUN composer install --no-interaction

# Expose port 5000
EXPOSE 5000

# Start the PHP built-in server
CMD ["php", "-S", "0.0.0.0:5000", "-t", "/var/www/html"]
