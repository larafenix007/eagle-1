## Description
A Laraval Package for Eagleplatform Wrapper.
This package comes with a service provider that configures the `Siqwell\Eagle\Client` and registers it to the IoC container.


## Installation
Install Composer

```
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```

## Configuration
Add to your `app/config/app.php` (Laravel 4) or 'config/app.php' (Laravel 5) the service provider:

```php
'providers' => array(
    // other service providers

    'Siqwell\Eagle\Laravel\EagleServiceProvider',
)
```

Then publish the configuration file:

#### Laravel 5:
```
php artisan vendor:publish --provider="Siqwell\Eagle\EagleServiceProvider"
```

Next you can modify the generated configuration file `eagle.php` accordingly.

That's all! Fire away!

## Usage
We can choose to either use the `Eagle` Facade, or to use dependency injection.

### Facade example
The example below shows how you can use the `Eagle` facade.
If you don't want to keep adding the `use Eagle\Siqwell\Facades\Eagle;` statement in your files, then you can also add the facade as an alias in `config/app.php` file.
```php
use Eagle\Siqwell\Facades\Eagle;

class MoviesController {

    function show($id)
    {
        // returns information of a movie
        return Eagle::getMoviesApi()->getMovie($id);
    }
}
```
