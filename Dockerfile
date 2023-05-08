FROM node:14
WORKDIR /app

COPY . /app

RUN npm install
RUN npm run build


FROM php:8.1-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip 

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

COPY --from=0 /app /var/www

RUN composer install
RUN mv -n .env.example .env
#RUN php artisan key:generate
#RUN php artisan migrate --force --seed
EXPOSE 9000
CMD ["php-fpm"]
#CMD php artisan serve --host=0.0.0.0