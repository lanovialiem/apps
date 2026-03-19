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
        Schema::create('medical_checkups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            // $table->string('name');                // nama karyawan
            $table->string('hospital')->nullable();
            $table->date('mcu_date')->nullable();  // tanggal MCU
            $table->string('result')->nullable();  // hasil MCU (Fit/Unfit/Other)
            $table->text('description')->nullable(); // keterangan tambahan
            $table->string('file_mcu');
            $table->string('expire_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_checkups');
    }
};
