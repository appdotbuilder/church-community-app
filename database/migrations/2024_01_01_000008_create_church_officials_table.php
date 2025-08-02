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
        Schema::create('church_officials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Name of the church official');
            $table->string('position')->comment('Official position/title in the church');
            $table->string('department')->nullable()->comment('Department or area of responsibility');
            $table->text('description')->nullable()->comment('Description of responsibilities');
            $table->integer('order_priority')->default(0)->comment('Order for displaying officials');
            $table->boolean('is_active')->default(true)->comment('Whether the official is currently active');
            $table->timestamps();
            
            $table->index('name');
            $table->index('position');
            $table->index('department');
            $table->index('order_priority');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('church_officials');
    }
};