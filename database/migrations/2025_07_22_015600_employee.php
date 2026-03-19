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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('identity_id');                  // Kolom B
            $table->string('badge_id');                     // Kolom C
            $table->string('request_type');                 // Kolom D
            $table->string('full_name');                    // Kolom E
            $table->string('nick_name')->nullable();        // Kolom F
            $table->date('birth_date');                     // Kolom G
            $table->string('birth_place');                  // Kolom H
            $table->enum('gender', ['Male', 'Female']);     // Kolom I
            $table->enum('marital_status', ['Single', 'Married']); // Kolom J
            $table->enum('skill_category', ['Skilled', 'Unskilled']); // Kolom K
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('category_code_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->string('nationality')->default('Indonesia'); // Kolom L
            $table->string('email');                        // Kolom M
            $table->string('country_code')->default('62');  // Kolom N
            $table->string('phone_number');                 // Kolom O
            $table->date('start_date');                     // Kolom P
            $table->date('end_date');                       // Kolom Q
            $table->string('image_profile')->nullable();

            //////

            $table->string('company')->nullable();
            $table->date('induction_date')->nullable();
            $table->string('status')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
