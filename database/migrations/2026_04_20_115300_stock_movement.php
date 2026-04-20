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

            $table->foreignId('product_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->foreignId('warehouse_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');

            $table->integer('quantity');
            $table->integer('previous_stock');
            $table->integer('new_stock');
            $table->enum('movement_type', ['tambah', 'kurang']);
            $table->date('movement_date');
            $table->enum('heading_type', ['Project', 'Gudang']);
            $table->text('description')->nullable();
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
