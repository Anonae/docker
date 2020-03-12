FROM richarvey/nginx-php-fpm
RUN git pull https://github.com/Anonae/docker
COPY . /var/www/html
