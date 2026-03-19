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
        Schema::create('penawarans', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('subject_name')->nullable();
            $table->string('category_penawaran')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('no_quotation')->nullable();
            $table->decimal('purposed_value', 15, 2)->nullable();
            $table->date('date_sph')->nullable();
            $table->text('description')->nullable();
            $table->text('upload_dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penawarans');
    }
};
