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
        Schema::create('secretariat_items', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Title of the secretariat item');
            $table->text('content')->comment('Content of the item');
            $table->enum('type', ['birthday', 'new_member', 'intern', 'diakonia_update', 'worship_update', 'special_offering', 'council_decision'])->comment('Type of secretariat item');
            $table->date('published_date')->comment('Date when the item should be published');
            $table->boolean('is_published')->default(false)->comment('Whether the item is published');
            $table->timestamps();
            
            $table->index('title');
            $table->index('type');
            $table->index('published_date');
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secretariat_items');
    }
};