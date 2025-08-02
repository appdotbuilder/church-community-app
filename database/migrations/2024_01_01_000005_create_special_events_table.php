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
        Schema::create('special_events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the special event');
            $table->enum('type', ['communion', 'baptism', 'confession', 'confirmation', 'wedding'])->comment('Type of special event');
            $table->text('description')->nullable()->comment('Description of the event');
            $table->datetime('scheduled_at')->nullable()->comment('Date and time of the event');
            $table->json('additional_info')->nullable()->comment('Additional event information');
            $table->boolean('is_active')->default(true)->comment('Whether the event is currently active');
            $table->timestamps();
            
            $table->index('name');
            $table->index('type');
            $table->index('scheduled_at');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_events');
    }
};