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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('status', ['backlog', 'in_progress', 'shipped'])->default('backlog');
            $table->integer('progress')->default(0); // 0-100
            $table->json('technologies')->nullable(); // Array of tech used
            $table->string('category')->nullable(); // Education, Project, Certification
            $table->date('started_at')->nullable();
            $table->date('completed_at')->nullable();
            $table->date('deadline')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
