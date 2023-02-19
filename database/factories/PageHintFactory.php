<?php

namespace Discoverlance\FilamentPageHints\Database\Factories;

use Discoverlance\FilamentPageHints\Models\PageHint;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageHintFactory extends Factory
{
    protected $model = PageHint::class;

    public function definition()
    {
        return [
            'title' => '',
            'hint' => '',
            'route' => '',
            'url' => '',
        ];
    }
}
