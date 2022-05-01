FROM php:8.0-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN apt-get update && apt-get upgrade -y
RUN adduser -D -H -S -s /bin/false -u 1000 myuser
ADD index.php /var/www/http/index.php