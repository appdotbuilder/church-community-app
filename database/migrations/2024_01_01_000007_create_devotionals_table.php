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
        Schema::create('devotionals', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Title of the devotional');
            $table->text('content')->comment('Main content of the devotional');
            $table->string('scripture_reference')->nullable()->comment('Bible verse reference');
            $table->date('week_starting')->comment('Starting date of the week this devotional is for');
            $table->boolean('is_published')->default(false)->comment('Whether the devotional is published');
            $table->timestamps();
            
            $table->index('title');
            $table->index('week_starting');
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devotionals');
    }
};