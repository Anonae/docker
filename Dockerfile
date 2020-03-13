# Pull base image.
FROM richarvey/nginx-php-fpm

# Install.
RUN	apk update && \
	apk add git && \
	mkdir /home/docker && \
	cd /home/docker && \
	git init && \
	git pull https://github.com/Anonae/docker && \
	git stash save --keep-index --include-untracked

# Copy Project to Work Directory.
COPY . /var/www/html

# Clean Project Other Files When More Than GitHub Project Files.
#RUN	git stash save --keep-index --include-untracked
