FROM php:8.3.4-fpm

# Defina seu usuário (opcional, mas estável)
ARG user=raycon
ARG uid=1000

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

# Instale Composer (copiado da imagem oficial mais recente)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Criação de usuário customizado
RUN useradd -G www-data,root -u $uid -d /home/$user $user \
    && mkdir -p /home/$user/.composer \
    && chown -R $user:$user /home/$user

# Instale e ative extensão Redis via PECL
RUN pecl install -o -f redis \
    && rm -rf /tmp/pear \
    && docker-php-ext-enable redis

# Defina diretório de trabalho da aplicação
WORKDIR /var/www

# Copie arquivo customizado PHP (já validado)
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Permissões (ajuste conforme necessário, 775 é mais seguro que 777)
RUN chmod -R 775 /var/www

# Mude para usuário não-root (opcional)
USER $user
