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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('item_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('warehouse_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->integer('quantity');
            $table->enum('movement_type', ['in', 'out', 'transfer']);
            $table->date('movement_date');
            $table->string('product_name');  // tanggal MCU
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movements');
    }
};
