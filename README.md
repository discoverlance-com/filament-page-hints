# Filament Page Hints for Filament Admin Panel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/discoverlance-com/filament-page-hints.svg?style=flat-square)](https://packagist.org/packages/discoverlance-com/filament-page-hints)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/discoverlance-com/filament-page-hints/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/discoverlance-com/filament-page-hints/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/discoverlance-com/filament-page-hints/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/discoverlance-com/filament-page-hints/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/discoverlance-com/filament-page-hints.svg?style=flat-square)](https://packagist.org/packages/discoverlance-com/filament-page-hints)

Create hints for your Filament pages that can serve as a guideline for users. You can create hints for each page and it will open a sidebar when the user clicks on it to view hints for a page.

## Installation

You can install the package via composer:

```bash
composer require discoverlance-com/filament-page-hints
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-page-hints-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-page-hints-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-page-hints-views"
```

## Usage

```php
$variable = new Discoverlance\FilamentPageHints();
echo $variable->echoPhrase('Hello, Discoverlance!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Lance Armah-Abraham](https://github.com/discoverlance-com)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
