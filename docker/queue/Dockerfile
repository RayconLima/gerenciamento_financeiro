# Use a imagem base com PHP 8.3.4
FROM php:8.3.4-fpm

# Defina o diretório de trabalho
WORKDIR /var/www

# Instale dependências do sistema e extensões PHP, incluindo PostgreSQL
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install mbstring exif pcntl bcmath gd sockets pdo_pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instale o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copie o aplicativo Laravel existente para o contêiner
COPY . /var/www

# Permissões (ajuste conforme necessário, 775 é mais seguro que 777)
RUN chmod -R 775 /var/www

# Comando padrão para o processamento de filas do Laravel
CMD ["php", "artisan", "queue:listen"]
