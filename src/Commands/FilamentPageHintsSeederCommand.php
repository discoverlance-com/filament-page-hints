<?php

namespace Discoverlance\FilamentPageHints\Commands;

use Discoverlance\FilamentPageHints\Models\PageHint;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'filament-page-hints:seeder')]
class FilamentPageHintsSeederCommand extends Command
{
    public $signature = 'filament-page-hints:seeder
        {--F|force : Override if the seeder already exists }
    ';

    public $description = 'Filament Page Hints seeder command. Seed the database with the page hints.';

    public function handle(): int
    {
        $path = database_path('seeders/PageHintSeeder.php');

        if (! $this->option('force') && $this->checkForCollision(paths: [$path])) {
            return static::INVALID;
        }

        if (PageHint::doesntExist()) {
            $this->warn(' There are no page hints to create the seeder. Please first run `filament-page-hints:install` or migrate the page hints table.');

            return static::INVALID;
        }

        // there are some minor issues with the html ', not being escaped, manual fix by user for now is required
        $allPageHints = collect(PageHint::get())
            ->map(function ($hint) {
                return [
                    'url' => $hint->url,
                    'route' => $hint->route,
                    'title' => $hint->title,
                    'hint' => $hint->hint,
                ];
            });

        $this->copyStubToApp(
            stub: 'PageHintSeeder',
            targetPath: $path,
            replacements: [
                'AllPageHints' => $allPageHints->all(),
            ]
        );

        $this->info('<fg=green;options=bold>PageHintSeeder</> generated successfully.');
        $this->line('Now you can use it in your deploy script. i.e:');
        $this->line('<bg=bright-green;options=bold> php artisan db:seed --class=PageHintSeeder </>');

        return Command::SUCCESS;
    }

    protected function checkForCollision(array $paths): bool
    {
        foreach ($paths as $path) {
            if ($this->fileExists($path)) {
                $this->error("$path already exists, aborting.");

                return true;
            }
        }

        return false;
    }

    protected function fileExists(string $path): bool
    {
        $filesystem = new Filesystem();

        return $filesystem->exists($path);
    }

    protected function copyStubToApp(string $stub, string $targetPath, array $replacements = []): void
    {
        $filesystem = new Filesystem();

        if (! $this->fileExists($stubPath = base_path("stubs/{$stub}.stub"))) {
            $stubPath = __DIR__."/../../stubs/{$stub}.stub";
        }

        $stub = Str::of($filesystem->get($stubPath));

        foreach ($replacements as $key => $replacement) {
            $stub = $stub->replace("{{ {$key} }}", is_array($replacement) ? json_encode($replacement) : $replacement);
        }

        $stub = (string) $stub;

        $this->writeFile($targetPath, $stub);
    }

    protected function writeFile(string $path, string $contents): void
    {
        $filesystem = new Filesystem();

        $filesystem->ensureDirectoryExists(
            (string) Str::of($path)
                ->beforeLast(DIRECTORY_SEPARATOR),
        );

        $filesystem->put($path, $contents);
    }
}
