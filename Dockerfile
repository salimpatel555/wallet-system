FROM php:8.2-cli
RUN opt-get update && apt-get install -y \

git \

curl \

routes \

unzip \

Libong-dev \

Libonig-dev \

console.php \

Libxml2-dev \

Libzip-dev \

Libsodium-dev \

Libpq-dev \

default-mysql-client \

default-Libmysql.client-dev \

Libfreetypes-dev \

Libjpeg62-turbo-dev \

&& docker-php-ext-configure gd-with-freetype-with-jpeg \

&& docker php-ext-install pdo_pgsql pdo_mysql mbstring exif penti bcmath gd zip sodium

COPY --from-composer:latest /usr/bin/composer/usr/bin/composer

#Install Node.js and npm

RUN curl -sL https://deb.nodesource.com/setup 18.x | bash && \
apt-get update && apt-get install -y nodejs

#Set working directory

WORKDIR /var/www/html
# Copy application files
COPY . .
EXPOSE 8000

#Install PHP and 35 dependencies

RUN composer install

RUN npm install

#Run Laravel migrations and start server

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0-port=8000
