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
        Schema::create('sick_reports', function (Blueprint $table) {
            $table->id();
            $table->date('sending_date');
            $table->text('reason');
            $table->enum('status', ['approved', 'pending', 'cancelled'])->default('pending');
            $table->unsignedBigInteger('applied_by');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sick_reports');
    }
};
