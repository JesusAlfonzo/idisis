<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('pendiente');
            $table->text('notes')->nullable();
            
            $table->foreignId('requesting_employee_id')->constrained('employees')->onDelete('cascade');
            $table->foreignId('destination_area_id')->constrained('areas')->onDelete('cascade');
            $table->foreignId('processed_by_employee_id')->nullable()->constrained('employees')->onDelete('cascade');
            
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requisitions');
    }
};