FROM php:8.1-fpm
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    vim \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

#RUN apt-get update; \
#    apt-get -y --no-install-recommends install \
#        git \
#        php8.1-bcmath \
#        php8.1-cgi \
#        php8.1-dba \
#        php8.1-ds \
#        php8.1-gd \
#        php8.1-gmp \
#        php8.1-http \
#        php8.1-imagick \
#        php8.1-imap \
#        php8.1-intl \
#        php8.1-mcrypt \
#        php8.1-mysql \
#        php8.1-psr \
#        php8.1-redis \
#        php8.1-ssh2 \
#        php8.1-tidy \
#        php8.1-xdebug \
#        php8.1-xsl \
#        php8.1-yaml; \
#    apt-get clean; \
#    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install -y apt-utils && apt-get clean

# Install NodeJS
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get update && apt-get install -y nodejs && apt-get clean

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN usermod -u 1000 www-data
USER www-data
