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
        Schema::create('financial_records', function (Blueprint $table) {
            $table->id();
            $table->string('description')->comment('Description of the financial record');
            $table->enum('type', ['offering', 'special_envelope', 'individual_contribution'])->comment('Type of financial record');
            $table->decimal('amount', 10, 2)->comment('Amount received');
            $table->date('received_date')->comment('Date when the funds were received');
            $table->string('contributor')->nullable()->comment('Name of contributor (for individual contributions)');
            $table->text('notes')->nullable()->comment('Additional notes about the contribution');
            $table->boolean('is_published')->default(false)->comment('Whether the record is published');
            $table->timestamps();
            
            $table->index('type');
            $table->index('received_date');
            $table->index('is_published');
            $table->index('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_records');
    }
};