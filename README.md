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

### Quickstart

To quickly get started, you can install the package config, migration and optionally run the your migrations with the commmand:

```bash
php artisan filament-page-hints:install
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-page-hints-migrations"
php artisan migrate
```

Optionally, you can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-page-hints-config"
```

This is the contents of the published config file, find options such as setting a different table name, and updating the icon and class used for styling parts of the hint feature.

```php
return [
    /**
     * Filament page table
     */
    'table_name' => 'filament_page_hints',
    /**
     * This is the icon of the hint button in the topbar
     */
    'hint_icon' => 'heroicon-o-information-circle',

    /**
     * The class of the hint button can be changed here
     */
    'hint_class' => 'w-5 h-5 cursor-pointer text-gray-800 dark:text-white',

    /**
     * Creating or updating a hint button color can be changed here
     */
    'upsert_hint_button_color' => 'success',
    'delete_hint_button_color' => 'warning',

    /**
     * Use this option to control whether you want to show the page hint resource in the navigation.
     */
    'show_resource_in_navigation' => true,
    /**
     * Rich Text Editor used for hints toolbar buttons can be edited here.
     */
    'toolbar_buttons' => [
        'blockquote',
        'bold',
        'bulletList',
        'codeBlock',
        'h3',
        'italic',
        'link',
        'orderedList',
        'strike',
    ],
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-page-hints-views"
```

Optionally, you can publish the translations using

```bash
php artisan vendor:publish --tag="filament-page-hints-translations"
```

## Usage

To show hints in the application for users to access, you will need to have at least published your migration. You can change the table name using the config option:

```php

'table_name' => 'filament_page_hints'
```

### Add a new Hint

To add a new hint:

-   Click on the hint icon on the topbar.
-   Click on **New Hint**.
-   Fill in the form to create a new hint.

You can update the `RichEditor` component's toolbar used for the hint in your config option (`'toolbar_buttons' => [...]`)

### Edit a hint

To edit a hint:

-   Click on the hint icon on the topbar.
-   Click on **Edit Hint**.
-   Make your updates and submit the form.

### Edit a hint

To delete a hint:

-   Click on the hint icon on the topbar.
-   Click on **Delete Hint**.

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
