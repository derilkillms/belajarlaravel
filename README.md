<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## materi
- artisan
- request lifecycle
- unit testing
- environment
- application environment
- configuration
- configuration cache
- dependency injection
- service container
- service provider
- facades
- routing
- view
- static file public
- mixing resource
- route parameter , regex constraints
- controller
- request (PR)

## command line
```php
// menjalankan laravel
php artisan serve

// membuat unit-test
php artisan make:test ClassTest

// menjalankan unit test
php artisan test --filter testFunction

// setting cache
php artisan config:cache

// membuat provider
php artisan make:provider FooBarServiceProvider

// clear all cache provider
php artisan clear-compiled

// melihat semua route di laravel
php artisan route:list

// compile template blade
php artisan view:cache

// clear compile template blade
php artisan view:clear

// controller
php artisan make:controller HelloController

```

## app make
```php
$foo = $this->app->make(Foo::class); // new Foo()
```

## singletons
```php
 $this->app->singleton(Foo::class, function(){
            return new Foo();
        });
```
## bind
```php
$this->app->bind(Person::class,function($app){
            return new Person("Diconic","Academy");
        });
```

## request
```php
$request->path();

$request->method(); // mengambil http method
$request->isMethod('post'); //mengecek ketersediaan method true/false
$request->header(key,default);

$request->bearerToken();
```

## maintenance
```php

//untuk mengaktifkan mode maintenance
php artisan down
php artisan serve

//menggunakan key
php artisan down --secret="deril"
php artisan serve
127.0.0.1:8000/deril //deril adalah secret key yang akan masuk ke cookie

```

## materi selanjutnya
- Laravel Blade Template
- Laravel Database / Eloquent
- Laravel Validation
- Laravel Command
- Laravel HTTP Client

