## Flashy

A powerful package for creating flash messages in Laravel.

[![License](http://poser.pugx.org/sakanjo/laravel-flashy/license)](https://packagist.org/packages/sakanjo/laravel-flashy)
[![Latest Stable Version](http://poser.pugx.org/sakanjo/laravel-flashy/v)](https://packagist.org/packages/sakanjo/laravel-flashy)
[![Total Downloads](http://poser.pugx.org/sakanjo/laravel-flashy/downloads)](https://packagist.org/packages/sakanjo/laravel-flashy)
![GitHub Repo stars](https://img.shields.io/github/stars/sakanjo/laravel-flashy?style=social)

## Installation

Require this package with composer using the following command

```bash
composer require sakanjo/laravel-flashy
```

Next publish the config file  using the vendor:publish Artisan command
```php
php artisan vendor:publish --provider="Flashy\ServiceProvider"
```

## Usage

```php
public function store(Request $request) {
  User::create([
    'name' => 'Salah Kanjo',
    'email' => 'dev.salah.kanjo@gmail.com'
  ]);
  Success('Successfully created');
}
```

```php
public function edit(Request $request) {
  Error_if(!auth()->user()->verified(), "Please verify your account first");

  ...
}
```

Or even a custom flash

```php
Flash('info', 'Account requires verification', ['url' => 'http://example.org']);
```

## Why

Imagine the next senario where you have a function inside another function and you want
to return an error from the inner one all the way up

```php
public function getData() {
  $user = Http::get('http://example.com/users/' . auth()->id);
  Error_if($user->failed(), 'Something went wrong');
  return $user;
}
```

```php
public function index() {
  $data = getData(); // Stops execution here if user not found

  return inertia('Home', compact('data'))
}
```

## Support
Do you like this project? Support it by donating

## Maintainers
Larvel flashy is developed and maintained by [Salah Kanjo](https://github.com/sakanjo)

## License

Laravel flashy is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
