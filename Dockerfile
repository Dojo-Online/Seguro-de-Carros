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

ENV COMPOSER_HOME=${HOME}/.composer

ENV PATH=${PATH}:${COMPOSER_HOME}/vendor/bin

ADD ./ /carinsurance

WORKDIR /carinsurance/projeto

# Enable zip
RUN docker-php-ext-install zip

# Setup timezone to America/Sao_Paulo
RUN cat /usr/src/php/php.ini-production | sed 's/^;\(date.timezone.*\)/\1 \"America\/Sao_Paulo\"/' > /usr/local/etc/php/php.ini

# install phpunit globally
RUN composer global require phpunit/phpunit:5.1@stable

# install the composer dependencies
RUN composer install

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