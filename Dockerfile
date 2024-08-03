FROM ghcr.io/jalallinux/laravel:php-82

WORKDIR /app

COPY start-container /usr/local/bin/start-container
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY . .
COPY .env.docker .env
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN composer install

RUN chmod +x /usr/local/bin/start-container

EXPOSE 8000 3000
ENTRYPOINT ["start-container"]
