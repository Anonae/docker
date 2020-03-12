# Pull base image.
FROM richarvey/nginx-php-fpm

# Install.
RUN	\
	apk update && \
	apk add git && \
	cd /home && \
	rm -rf docker && \
	git clone https://github.com/Anonae/docker && \
	cd /home/docker

COPY . /var/www/html
