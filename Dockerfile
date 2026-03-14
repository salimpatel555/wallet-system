FROM php:8.2-cli
RUN opt-get update && apt-get install -y \

git

curl

routes

unzip

Libong-dev

Libonig-dev

console.php


Libxml2-dev\

Libzip-dev

Libsodium-dev\

Libpq-dev

default-mysql-client

default-Libmysql.client-dev

Libfreetypes-dev

Libjpeg62-turbo-dev\

&& docker-php-ext-configure gd-with-freetype-with-jpeg \

&& docker php-ext-install pdo_pgsql pdo_mysql mbstring exif penti bcmath gd zip sodium
