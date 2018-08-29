FROM nextcloud:fpm

COPY startup.sh /usr/local/bin/startup
RUN chmod +x /usr/local/bin/startup

CMD ["/usr/local/bin/startup"]