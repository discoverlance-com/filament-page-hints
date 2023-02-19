<?php

namespace Discoverlance\FilamentPageHints\Resources\PageHintsResource\Pages;

use Discoverlance\FilamentPageHints\Resources\PageHintsResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePageHints extends CreateRecord
{
    protected static string $resource = PageHintsResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['url'] = route($data['route']);

        return $data;
    }
}
