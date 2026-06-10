<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('knowledge_base_chunks', function (Blueprint $table) {

            $table->id();

            $table->foreignId('knowledge_base_id')
                ->constrained('knowledge_base')
                ->cascadeOnDelete();

            $table->unsignedInteger('chunk_number');

            $table->unsignedInteger('page_number')
                ->nullable();

            $table->longText('content');

            $table->timestamps();

            $table->unique([
                'knowledge_base_id',
                'chunk_number'
            ]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('knowledge_base_chunks');
    }
};
