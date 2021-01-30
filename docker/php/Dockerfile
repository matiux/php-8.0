FROM matiux/php:8.0.1-fpm-alpine3.13-dev

USER root

COPY conf/xdebug-starter.sh /usr/local/bin/xdebug-starter
RUN chmod +x /usr/local/bin/xdebug-starter
RUN /usr/local/bin/xdebug-starter

RUN /usr/local/bin/composer self-update

USER utente

RUN echo 'alias test="vendor/bin/phpunit"' >> /home/utente/.zshrc \
    && echo 'alias sfcc="rm -Rf var/cache/*"' >> /home/utente/.zshrc \
    && echo 'alias sf="bin/console"' >> /home/utente/.zshrc \
    && echo 'alias psalm="vendor/bin/psalm --no-cache"' >> /home/utente/.zshrc

