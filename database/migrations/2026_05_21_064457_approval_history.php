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
        Schema::create('approval_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penawaran_id');
            $table->string('notes'); // Catatan perubahan status
            $table->string('name'); // Nama approver
            $table->string('role'); // Role approver
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps(); // Waktu perubahan status

            // Foreign key constraint
            $table->foreign('penawaran_id')->references('id')->on('penawarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approval_histories');
    }
};
