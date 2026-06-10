<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('knowledge_base', function (Blueprint $table) {

            $table->unsignedInteger('version')
                ->default(1)
                ->after('file');

            $table->boolean('is_active')
                ->default(true)
                ->after('version');

            $table->string('processing_status')
                ->default('pending')
                ->after('is_active');

            $table->unsignedInteger('chunk_count')
                ->default(0)
                ->after('processing_status');

            $table->text('error_message')
                ->nullable()
                ->after('chunk_count');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('knowledge_base', function (Blueprint $table) {

            $table->dropColumn([
                'version',
                'is_active',
                'processing_status',
                'chunk_count',
                'error_message',
            ]);

        });
    }
};
