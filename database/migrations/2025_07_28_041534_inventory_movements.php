<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_movements', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'in', 'out', 'adjustment'
            $table->decimal('quantity', 15, 2);
            $table->text('notes')->nullable();
            
            // Relación polimórfica
            $table->string('related_document_type')->nullable();
            $table->unsignedBigInteger('related_document_id')->nullable();
        $table->index(['related_document_type', 'related_document_id'], 'inv_mov_doc_type_id_idx'); // Use a shorter name
                    
            $table->foreignId('inventory_lot_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_movements');
    }
};