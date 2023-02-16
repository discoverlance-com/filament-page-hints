<?php

namespace Discoverlance\FilamentPageHints\Resources\PageHintsResource\Pages;

use Discoverlance\FilamentPageHints\Resources\PageHintsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPageHints extends ListRecords
{
    protected static string $resource = PageHintsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}