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
        Schema::create('purchaserequests', function (Blueprint $table) {
            $table->id();
              $table->text('description')->nullable();
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->foreignId('branch_id')->constrained('branches')->onDelete('cascade');
        $table->foreignId('warehouse_id')->constrained('warehouses')->onDelete('cascade');  
        $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchaserequests');
    }
};
