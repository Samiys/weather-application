# Use an official PHP image
FROM php:8.3-cli

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy the source code to the container
COPY ./backend /var/www/html

# Expose port 5000
EXPOSE 5000

# Start the PHP built-in server
CMD ["php", "-S", "0.0.0.0:5000", "-t", "/var/www/html"]
