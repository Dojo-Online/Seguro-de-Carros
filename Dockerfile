FROM php:5.6-cli

MAINTAINER Luis Fernando Gomes <dev@luiscoms.com.br>

# Install extensions
RUN apt-get update \
		&& apt-get install -y \
		git \
		zlib1g-dev

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
	&& mv composer.phar /usr/local/bin/composer

ADD ./ /carinsurance

WORKDIR /carinsurance/projeto

# Enable and configure xdebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
# RUN sed -i '1 a xdebug.remote_autostart=true' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_mode=req' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_handler=dbgp' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_connect_back=1 ' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_port=9000' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_host=127.0.0.1' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
# RUN sed -i '1 a xdebug.remote_enable=1' /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Enable zip
RUN docker-php-ext-install zip

# install the composer dependencies
RUN composer install