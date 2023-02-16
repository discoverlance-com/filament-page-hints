<?php

namespace Discoverlance\FilamentPageHints;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Discoverlance\FilamentPageHints\Commands\FilamentPageHintsCommand;

class FilamentPageHintsServiceProvider extends PackageServiceProvider
{
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
            ->hasInstallCommand(function(InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('discoverlance-com/filament-page-hints');
            });
    }
}
