<?php

namespace Discoverlance\FilamentPageHints\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageHint extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function getTable()
    {
        return config('filament-page-hints.table_name', parent::getTable());
    }
}