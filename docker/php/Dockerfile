FROM nextcloud:20-fpm

RUN pecl install xdebug

COPY files/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

COPY files/entrypoint.sh /usr/local/bin/entrypoint
RUN chmod +x /usr/local/bin/entrypoint

COPY files/setup.sh /usr/local/bin/apache
RUN chmod +x /usr/local/bin/apache

ENTRYPOINT ["/usr/local/bin/entrypoint"]
CMD ["php-fpm"]