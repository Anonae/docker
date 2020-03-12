# Pull base image.
FROM richarvey/nginx-php-fpm

# Install.
RUN	apk update && \
	apk add git

# Make GitHub Project Directory.
RUN	mkdir /home/docker && \
	cd /home/docker

# Pull Project.
RUN	git init && \
	git pull https://github.com/Anonae/docker

# Clean Project Other Files When More Than GitHub Project Files.
RUN	git stash save --keep-index --include-untracked

# Copy Project to Work Directory.
COPY . /var/www/html
