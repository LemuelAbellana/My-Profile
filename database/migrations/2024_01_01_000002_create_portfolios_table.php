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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail')->nullable();
            $table->string('url')->nullable();
            $table->string('github_url')->nullable();
            
            // QA Scorecard
            $table->boolean('tests_passing')->default(true);
            $table->integer('critical_bugs')->default(0);
            $table->integer('minor_bugs')->default(0);
            $table->integer('performance_score')->default(0); // 0-100
            
            // Tech Stack
            $table->json('technologies')->nullable();
            
            // Case Study Details
            $table->text('challenge')->nullable();
            $table->text('solution')->nullable();
            $table->text('results')->nullable();
            
            // Meta
            $table->date('completed_at')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
