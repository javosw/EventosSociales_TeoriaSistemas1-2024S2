FROM node:20.18.0-alpine3.19 AS frontend_builder
WORKDIR /src-frontend
COPY src-frontend/package*.json .
RUN npm install
COPY src-frontend/ .
RUN npm run build


FROM php:8.1-apache
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
WORKDIR /var/www/html
COPY src-backend/ /var/www/html/api/
COPY --from=frontend_builder /src-frontend/dist/browser/ /var/www/html/
COPY .htaccess /var/www/html/.htaccess
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]