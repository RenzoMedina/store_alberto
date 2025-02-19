# Usa una imagen base de PHP
FROM php:8.2-apache

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos del proyecto al directorio de trabajo
COPY . .

# Habilita el módulo mod_rewrite
RUN a2enmod rewrite

# Establece los permisos de archivos y directorios
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

## Instala las dependencias de Composer y Node.js
RUN apt-get update && apt-get install -y \
unzip \
curl \
gnupg \
&& docker-php-ext-install pdo pdo_mysql \
&& curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
&& curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
&& apt-get install -y nodejs \
&& composer install

# Instala las dependencias de npm
RUN npm install

# Expone el puerto que será utilizado
EXPOSE 80

# Comando para iniciar el servidor
CMD ["apache2-foreground"]