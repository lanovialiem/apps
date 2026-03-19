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
        Schema::create('project_employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('project_lists')->onDelete('cascade');
            $table->string('name', 100);
            $table->string('company_name')->nullable();
            $table->string('address', 150)->nullable();
            $table->date('mcu')->nullable();
            $table->string('position', 100)->nullable();
            $table->enum('gender', ['L', 'P'])->default('L');
            $table->date('induction')->nullable();
            $table->date('on_site')->nullable();
            $table->date('date_resign')->nullable();
            $table->enum('status', ['Aktif', 'Resign'])->default('Aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_employees');
    }
};
