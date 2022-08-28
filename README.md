# Laravel Options
<p align="center">
  <img width="300" height="300" src="logo.png">
</p>


## Introduction
Sometimes you need to create a global key-value store to put your website settings and options that
you may change later on the fly without editing your `.env` file everytime you make a change.

## Installation
To get started with `laravel-options` use composer to add the package to your `composer.json` file:
```shell
composer require mehdikhody/laravel-options
```
And execute the migration command to create the `options` table:
```shell
php artisan migrate
```
To customise table name or set some default options, you can publish our
config file using the following command:
```shell
php artisan vendor:publish --provider="Mehdikhody\Options\Providers\OptionsServiceProvider"
```
After that, laravel would generate a config file named `option.php` in the config directory.
```php
return [
    'table' => 'options',
    'options' => [
        'tax_fee' => 0.28,
        'is_shop_open' => true
    ]
];
```
If you made a change to the default options later on (after migration), you can run this command to update the `options` table accordingly.
```shell
php artisan option:seed
```

## Usage
There is three-way that you can choose from:
1. `Mehdikhody\Options\Facades\Option` Facade.
2. helper functions like: `option_set($key, $value)`
3. command line like: `php artisan option:set key value`

### Creat or update an option
Set a given option value.
```php
Option::set('name', 'Jon Doe');
option_set('tax_fee', 0.3);
```

### Check if an option exists
Determine if the given option value exists.
```php
$hasName = Option::has('name');         // true
$hasAge = option_has('age');            // false
```

### Get an option
Get the specified option value.
```php
$name = Option::get('name');            // Jon Doe
$age = option_get('age', 26);           // 26
```

### Delete an option
Delete the specified option value.
```php
Option::remove('name');
option_remove('age');
```

### Delete all the options
Delete all the options and restore the default options in the `config/option.php`.
```php
Option::clear();
option_clear();
```

### Get an option model
Get the option model instance to access data like `created_at` or `updated_at`.
```php
$model = Option::getModel('tax_fee'); // or option_get_model('tax_fee')
$created_at = $model->created_at;
$updated_at = $model->updated_at;
```

### Console commands
It is also possible to do everything above within the console:
```shell
php artisan option:set key value
php artisan option:get key
php artisan option:has key
php artisan option:remove key
php artisan option:info key
php artisan option:all
php artisan option:clear
php artisan option:seed
```
