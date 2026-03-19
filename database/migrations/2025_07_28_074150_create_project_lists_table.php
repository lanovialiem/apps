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
        Schema::create('project_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penawaran_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->string('company_name')->nullable();
            $table->string('project_name');
            $table->string('category_project')->nullable();
            $table->string('contact_person')->nullable();
            $table->decimal('purposed_value', 15, 2)->nullable();
            $table->string('no_quotation');
            $table->date('date_sph')->nullable();
            $table->string('no_contract');
            $table->date('date_contract')->nullable();
            $table->decimal('approved_value', 15, 2)->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_lists');
    }
};
