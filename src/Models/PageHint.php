<?php

namespace Discoverlance\FilamentPageHints\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageHint extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "filament_page_hints_table";
}