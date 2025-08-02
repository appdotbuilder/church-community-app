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
        Schema::create('church_organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the church organization');
            $table->enum('type', ['youth', 'children', 'women', 'men', 'seniors'])->comment('Type of organization');
            $table->text('description')->nullable()->comment('Description of the organization');
            $table->json('schedule')->nullable()->comment('JSON array of schedule information');
            $table->boolean('is_active')->default(true)->comment('Whether the organization is currently active');
            $table->timestamps();
            
            $table->index('name');
            $table->index('type');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('church_organizations');
    }
};