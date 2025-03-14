FROM webdevops/php-apache:8.2-alpine

RUN docker build -t my-app -f ./dockerizer/Dockerfile .