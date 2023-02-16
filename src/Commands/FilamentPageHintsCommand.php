<?php

namespace Discoverlance\FilamentPageHints\Commands;

use Illuminate\Console\Command;

class FilamentPageHintsCommand extends Command
{
    public $signature = 'filament-page-hints';

    public $description = 'Filament Page Hints command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
