<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('policies', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('slug')->unique();

            $table->string('category');
            // Leave / POSH / HR / Company

            $table->longText('description')
                ->nullable();

            $table->string('file_url')
                ->nullable();

            $table->enum('status',['draft','published'])
                ->default('published');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
