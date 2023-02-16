<?php

namespace Discoverlance\FilamentPageHints\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Discoverlance\FilamentPageHints\Models\PageHint;


class PageHintFactory extends Factory
{
    protected $model = PageHint::class;

    public function definition()
    {
        return [
            'title' => '',
            'description' => '',
            'route' => '',
            'url' => ''
        ];  
    }
}
