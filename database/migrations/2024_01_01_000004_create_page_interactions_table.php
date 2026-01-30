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
        Schema::create('page_interactions', function (Blueprint $table) {
            $table->id();
            $table->string('session_id');
            $table->enum('event_type', [
                'mode_toggle', 
                'card_click', 
                'project_view',
                'project_search',
                'ticket_submit',
                'resume_download'
            ]);
            $table->json('metadata')->nullable();
            $table->timestamps();
            
            $table->index('session_id');
            $table->index('event_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_interactions');
    }
};
