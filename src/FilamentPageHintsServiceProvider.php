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
            ->hasMigration('filament_page_hints')
            ->hasCommand(FilamentPageHintsCommand::class)
            ->hasTranslations()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('discoverlance-com/filament-page-hints');
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
