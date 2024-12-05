## Installation

You can install the package via composer:

```bash
composer require schmev91/laravel-enums-to-json
```

Run the command below and to run all the necessary steps

```bash
php artisan enums-to-json:setup
```

Or

You can manually publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-enums-to-json-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-enums-to-json-config"
```
