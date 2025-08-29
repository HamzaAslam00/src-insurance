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
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('name');
            $table->string('company_name')->nullable();
            $table->string('premium')->nullable();
            $table->text('description')->nullable();
            $table->text('policy_type')->nullable();
            $table->text('policy_type_other')->nullable();
            $table->text('policy_number')->nullable();
            $table->date('expiration_date')->nullable();
            $table->date('effective_date')->nullable();
            $table->string('file');
            $table->enum('status', ['active','expired', 'cancelled', 'pending_cancellation'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policies');
    }
};
