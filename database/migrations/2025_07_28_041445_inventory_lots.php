<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_lots', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');
            $table->string('lot_number');
            $table->date('expiration_date')->nullable();
            $table->integer('quantity')->default(0);
            $table->decimal('cost', 10, 2)->default(0.00);
            $table->integer('uses_remaining')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['product_id', 'lot_number', 'warehouse_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_lots');
    }
};