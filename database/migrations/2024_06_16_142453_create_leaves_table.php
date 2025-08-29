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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->text('reason');
            $table->text('detail')->nullable();
            $table->enum('status', ['approved', 'pending', 'cancelled'])->default('pending');
            $table->unsignedBigInteger('applied_by');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->string('document')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('applied_by')->references('id')->on('users');
            $table->foreign('approved_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
