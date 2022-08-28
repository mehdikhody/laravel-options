# Laravel Options
<p align="center">
  <img width="300" height="300" src="logo.png">
</p>


## Introduction
Sometimes you need to create a global key-value store to put your website settings in. 
You would change your settings dynamically on fly, for that, you can use Cache base system 
but caching has some disadvantages that make it unsuitable for our use cases. This is a cleaner way to do settings.
To make your job easier we put a `Option` Facade and helper functions for shortcuts and a cli tool.


## Installation
To get started with laravel-options, use Composer to add the package to your project's dependencies:
```shell
composer require appstract/laravel-options
```
And execute migrate command to migrate options table
```shell
php artisan migrate
```
To customise table name or put some options in the initiation time, you can publish our
config file using following command:
```shell
php artisan vendor:publish --provider="Mehdikhody\Options\Providers\OptionsServiceProvider"
```
After executing the command above, laravel would generate a config file named `option.php` in the config directory.
```php
return [
    'table' => 'options',
    'options' => [
        'tax_fee' => 0.28,
        'is_shop_open' => true
    ]
];
```
If you have changed the default options later on (after migration), you can run this command to update the `options` table accordingly.
```shell
php artisan option:seed
```

## Usage

### Creat or update an option
Set a given option value.
```php
use Mehdikhody\Options\Facades\Option;

Option::set('name', 'Jon Doe');
option_set('tax_fee', 0.3);
```

### Check if an option exists
Determine if the given option value exists.
```php
use Mehdikhody\Options\Facades\Option;

if (Option::has('name') || option_has('age')) {
    // do stuff
}
```

### Get an option
Get the specified option value.
```php
use Mehdikhody\Options\Facades\Option;

$name = Option::get('name');    // Jon Doe
$age = option_get('age', 26);   // 26

if (Option::get('is_shop_open', false)) {
    // do stuff when shop is open
}
```

### Delete an option
Delete the specified option value.
```php
use Mehdikhody\Options\Facades\Option;

Option::remove('name');
option_remove('age');
```

### Delete all the options
Delete all the options and restore the default options in the `config/option.php`.
```php
use Mehdikhody\Options\Facades\Option;

Option::clear();
option_clear();
```

### Get an option model
Get the option model instance to access data like `created_at` or `updated_at`.
```php
use Mehdikhody\Options\Facades\Option;

$model = Option::getModel('tax_fee'); // option_get_model('tax_fee');
$created_at = $model->created_at;
$updated_at = $model->updated_at;
```

### Console commands
It is also possible to do everything above within the console:
```shell
php artisan option:set name Jon Doe      // Set an option
php artisan option:get name              // -> Jon Doe
php artisan option:has age               // -> Option age dont exists.
php artisan option:remove name           // -> name has been deleted.
php artisan option:clear                 // -> Options wiped out.
php artisan option:seed                  // Seed the options table with the default options.
```
