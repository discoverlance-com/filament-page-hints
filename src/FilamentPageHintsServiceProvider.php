<?php

namespace Discoverlance\FilamentPageHints;

use Discoverlance\FilamentPageHints\Commands\FilamentPageHintsCommand;
use Discoverlance\FilamentPageHints\Resources\PageHintsResource;
use Filament\Facades\Filament;
use Filament\Pages\Page;
use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;

class FilamentPageHintsServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        PageHintsResource::class,
    ];

    protected array $styles = [
        'filament-page-hints-styles' => __DIR__.'/../dist/filament-page-hints.css',
    ];

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-page-hints')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament_page_hints_table')
            ->hasCommand(FilamentPageHintsCommand::class)
            ->hasTranslations()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->startWith(function (InstallCommand $command) {
                        $command->info('Hello, and welcome to filament page hints!');
                    })
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('discoverlance-com/filament-page-hints')
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Have a great day!');
                    });
            });
    }

    public function boot()
    {
        Livewire::component('page-hints', Http\Livewire\PageHints::class);

        Filament::registerRenderHook(
            'user-menu.start',
            fn (): string => Blade::render('@livewire(\'page-hints\')'),
        );

        Livewire::listen('component.hydrate.initial', function ($component, $request) {
            if (! ($component instanceof Page)) {
                return;
            }

            app()->bind('page-title', fn () => invade($component)->getTitle());
        });
        parent::boot();
    }
}
