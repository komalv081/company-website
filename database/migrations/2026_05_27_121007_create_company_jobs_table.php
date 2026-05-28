<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->unique();

            $table->longText('description');

            $table->string('department')->nullable();
            $table->string('location')->nullable();

            $table->string('experience')->nullable();

            $table->string('employment_type')->nullable();
            // Full Time / Part Time / Internship

            $table->integer('vacancies')->default(1);

            $table->date('deadline')->nullable();

            $table->enum('status',['draft','published'])
                ->default('draft');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
