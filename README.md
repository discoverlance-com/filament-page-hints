# Filament Page Hints for Filament Admin Panel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/discoverlance/filament-page-hints.svg?style=flat-square)](https://packagist.org/packages/discoverlance/filament-page-hints)
[![Total Downloads](https://img.shields.io/packagist/dt/discoverlance/filament-page-hints.svg?style=flat-square)](https://packagist.org/packages/discoverlance/filament-page-hints)

Create hints for your Filament pages that can serve as a guideline for users. You can create hints for each page and it will open a sidebar when the user clicks on it to view hints for a page.

## Installation

You can install the package via composer:

```bash
composer require discoverlance/filament-page-hints
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
    'hint_icon' => 'heroicon-o-question-mark-circle',

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

### Store and Seed database with page hints

As a convienient helper, you can run the command `php artisan filament-page-hints:seeder` and it will load all your current page hints into a seeder class, `database\seeder\PageHintSeeder`.

> NOTE: If you have quotes, like single quote in your hint from the database, you might have to fix this more manually with escape (/). I was not able to find a way to fix that so for now as even `addslashes` was adding double // instead of one /, so ensure that after you generate your seeder class, you check the `$allPageHints` array (json) to make sure there are no issues with quotes.

### Adding permissions to hint operations

Because there's not a global method for assigning permissions in filament admin panel as you might be using `filament-shield` or a different package to handle your user permissions, for now, this is a suggestive approach to handling this:

You can mostly do this in the blade:

```bash
// First publish the views _if you have not already done_ so with the command:
php artisan vendor:publish --tag="filament-page-hints-views"
```

An example to restrict the create action with **create_hints** permission will be:

```php

// `views/vendor/filament-page-hints/components/modal/actions.blade.php`
// hide the create action
@can('create_hints')
    <div {{ $attributes }}>
        ... // other blade code here
    </div>
@endcan

// `views/vendor/filament-page-hints/page-hints.blade.php`
// also hide the create/edit modal
@can('create_hints')
    <x-filament::modal id="create-hint" width="xl">
        ... // other blade code here
    </x-filament::modal>
@endcan

```

If you want to also hide the edit/delete actions, you can do so in the `views/vendor/filament-page-hints/components/modal/index.blade.php`

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
