FROM webdevops/php-nginx:8.2

WORKDIR /app

COPY . /app
RUN mkdir -p storage/logs

RUN chown -R application:application /app/storage /app/bootstrap/cache

RUN chmod -R 775 /app/storage /app/bootstrap/cache
# Laravel public directory
ENV WEB_DOCUMENT_ROOT=/app/public

# Install Node.js
RUN apt-get update && \
    apt-get install -y curl && \
    curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

RUN composer install --no-dev --optimize-autoloader

RUN npm install

RUN npm run build

RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan view:clear

EXPOSE 80
