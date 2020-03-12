# Pull base image.
FROM richarvey/nginx-php-fpm

# Install.
RUN	\
	apk update && \
	cd /home && \
	rm -rf docker && \
	mkdir docker && \
	cd /home/docker && \
	git clone https://github.com/Anonae/docker
	#git pull https://github.com/Anonae/docker \
COPY . /var/www/html
