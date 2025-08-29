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
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('register_type', ['hours', 'km'])->default('hours');
            $table->dateTime('start_date');
            $table->dateTime('end_date')->nullable();
            $table->text('work_detail')->nullable();
            $table->enum('working_kind', ['working_hours', 'overtime'])->nullable();
            $table->string('type')->nullable();
            $table->float('hours')->nullable();
            $table->double('kilometer')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_hours');
    }
};
