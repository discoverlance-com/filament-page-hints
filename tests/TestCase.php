<?php

namespace Discoverlance\FilamentPageHints\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Discoverlance\FilamentPageHints\FilamentPageHintsServiceProvider;
use Discoverlance\FilamentPageHints\Http\Livewire\PageHints;
use Filament\FilamentServiceProvider;
use Livewire\Livewire;
use Livewire\LivewireServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Discoverlance\\FilamentPageHints\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );

        // $this->registerLivewireComponents();
    }

    protected function registerLivewireComponents(): self
    {
        Livewire::component('page-hints', PageHints::class);
        return $this;
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            FilamentPageHintsServiceProvider::class,

        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__ . '/../database/migrations/create_filament_page_hints_table.php.stub';
        $migration->up();
    }
}
