<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        $tableName = config('filament-page-hints.table_name');
        Schema::create($tableName, function (Blueprint $table) {
            $table->id();
            $table->uuid();

            // add fields
            $table->string('title',255);
            $table->string('route');
            $table->string('url')->nullable();
            $table->text('hint');

            $table->timestamps();
        });
    }

    public function down() {
        $tableName = config('filament-page-hints.table_name');
        Schema::drop($tableName);
    }
};
