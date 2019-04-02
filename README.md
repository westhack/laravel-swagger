# laravel-swagger | Swagger UI [Package](https://packagist.org/packages/westhack/laravel-swagger)

- [About](#about)
- [Requirements](#requirements)
- [Installation](#installation)
- [License](#license)

## About
 This is the Swagger 3.0 ui

## Requirements

* [Laravel 5.1, 5.2, 5.3, 5.4, or 5.5+](https://laravel.com/docs/installation)

## Installation

1. From your projects root folder in terminal run:

```bash
    composer require rachidlaasri/laravel-installer
```

2. Register the package

* Laravel 5.5 and up
Uses package auto discovery feature, no need to edit the `config/app.php` file.

* Laravel 5.4 and below
Register the package with laravel in `config/app.php` under `providers` with the following:

```php
	'providers' => [
	    \Westhack\LaravelSwagger\Providers\SwaggerServiceProvider::class,
	];
```

3. Publish the packages views, config file, assets files by running the following from your projects root folder:

```bash
    php artisan vendor:publish --provider="Westhack\LaravelSwagger\Providers\SwaggerServiceProvider"
```

## Routes

* `/swagger`
* `/api/swagger`

## License

MIT license
