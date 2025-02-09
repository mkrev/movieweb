# Mowieweb

Mowieweb is an application based on the [Laravel](https://laravel.com/docs) framework, used to search movie
recommendations

## Docker project setup

add following line to .bashrc
`alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'`

## Local project setup

To start the project fork this repo, copy .env.example to .env

run application with command:

`composer install`

`sail up`

### To run all tests with check coverage use command:

`sail composer test`

### To generate Swagger documentation use command:

`sail composer swagger`

### To run all commands that also run on pipelines use command:

`sail composer ci`

You can find more commands in composer.json's scripts section.

## Documentation

Documentation is available at [Swagger](http://localhost:3001/api/documentation)

## Information
Application code is located in the `app` directory

Tests are located in the `tests` directory
