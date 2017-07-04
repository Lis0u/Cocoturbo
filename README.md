# Cocoturbo
PHP Project

## Setup

Clone the repository then
```sh
$ composer install
```
Create *cocoturbo* database then
```sh
$ php artisan migrate
$ php artisan db:seed
$ php artisan serve
```
Enjoy on localhost:8000

## Useful information

Account: \
email : user1@email.com \
password : password

Config of .env file for production: \
APP_ENV=production \
APP_DEBUG=false

## Dusk tests

```sh
$ php artisan dusk
```

## Unit tests

```sh
$ ./vendor/bin/phpunit
```