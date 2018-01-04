# Introduction

[![Build Status](https://travis-ci.org/oanhnn/laravel-flash-message.svg?branch=master)](https://travis-ci.org/oanhnn/laravel-flash-message)
[![Coverage Status](https://coveralls.io/repos/github/oanhnn/laravel-flash-message/badge.svg?branch=master)](https://coveralls.io/github/oanhnn/laravel-flash-message?branch=master)

Easy Flash Messages for Your Laravel 5.4+ Application

## Main features

This composer package offers a Twitter Bootstrap optimized flash messaging setup for your Laravel 5.4+ Applications.

## Requirements

* php >=7.0
* Laravel 5.4+

## Installation

Begin by pulling in the package through Composer.

```bash
$ composer require oanhnn/laravel-flash-message
```

Next, if using Laravel 5.5+, you done. If using Laravel 5.4, include the service provider within your `config/app.php` file.

```php
// config/app.php

    'providers' => [
        // Other service providers...

        Laravel\FlashMessage\FlashMessageServiceProvider::class,
    ],
    
    'aliases' => [
        // Other alias classes
        
        'Flash' => Laravel\FlashMessage\Facades\Flash::class,
    ],
```
Finally, as noted above, the default CSS classes for your flash message are optimized for Twitter Bootstrap. As such, pull in the Bootstrap's CSS within your HTML or layout file.

```html
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
```

## Usage
Within your controllers, before you perform a redirect, use `Flash` facade.

```php
public function save()
{
    Flash::success('Save success!')->important();

    return redirect('/home');
}
```

You may also do:

| method                                      | description                                            |
|---------------------------------------------|--------------------------------------------------------|
| `Flash::success('message')`                 | Set the flash message with theme "success alert".      |
| `Flash::warning('message')`                 | Set the flash message with theme "warning alert".      |
| `Flash::error('message')`                   | Set the flash message with theme "error alert".        |
| `Flash::info('message')`                    | Set the flash message with theme "info alert".         |
| `Flash::info('message')->important()`       | Add a close button to the flash message.               |
| `Flash::info('message')->overlay('title')`  | Display flash message as a modal overlay with a title. |

And include flash message view into your blade template.
 
```php
@include('flash::message')
```

## Changelog

See all change logs in [CHANGELOG](CHANGELOG.md)

## Testing

```bash
$ git clone git@github.com/oanhnn/laravel-flash-message.git /path
$ cd /path
$ composer install
$ composer phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email to [Oanh Nguyen](mailto:oanhnn.bk@gmail.com) instead of 
using the issue tracker.

## Credits

- [Oanh Nguyen](https://github.com/oanhnn)
- [All Contributors](../../contributors)

## License

This project is released under the MIT License.   
Copyright © 2017-2018 [Oanh Nguyen](https://oanhnn.github.io/).
