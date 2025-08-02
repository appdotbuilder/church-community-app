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
        Schema::create('diakonia_members', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the sick member');
            $table->string('domicile_group')->comment('The congregational group the member belongs to');
            $table->string('place_of_care')->comment('Hospital, home, or care facility where the member is');
            $table->text('condition')->nullable()->comment('Brief description of the condition');
            $table->date('care_started')->nullable()->comment('Date when care/illness started');
            $table->boolean('is_active')->default(true)->comment('Whether the member still needs care');
            $table->timestamps();
            
            $table->index('name');
            $table->index('domicile_group');
            $table->index('is_active');
            $table->index('care_started');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diakonia_members');
    }
};