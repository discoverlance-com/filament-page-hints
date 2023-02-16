<?php

namespace Discoverlance\FilamentPageHints\Resources\PageHintsResource\Pages;

use Discoverlance\FilamentPageHints\Resources\PageHintsResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPageHints extends EditRecord
{
    protected static string $resource = PageHintsResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}