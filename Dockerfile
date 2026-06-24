FROM webdevops/php-nginx:8.2

WORKDIR /app

COPY . /app

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
