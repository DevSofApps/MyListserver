# Usar a imagem PHP + Nginx Alpine
FROM webdevops/php-nginx:8.2-alpine

# Copiar o arquivo php.ini para a configuração do PHP
COPY ./dockerizer/php.ini /opt/docker/etc/php/php.ini

# Copiar o arquivo de configuração do Nginx
COPY ./dockerizer/vhost.conf /opt/docker/etc/nginx/vhost.conf

# Copiar os arquivos composer.json e composer.lock para o diretório do app
COPY composer.json composer.lock /app/

# Instalar as dependências do Composer
RUN composer install --no-interaction --no-scripts --no-suggest

# Copiar o restante dos arquivos da aplicação para o diretório /app
COPY . /app

# Expor a porta em que o Nginx vai rodar
EXPOSE 80

# Iniciar o Nginx com o PHP-FPM
CMD ["php-fpm"]
