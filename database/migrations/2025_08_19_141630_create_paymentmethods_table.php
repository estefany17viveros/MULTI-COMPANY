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
        Schema::create('paymentmethods', function (Blueprint $table) {
            $table->id();
            $table->string('cardholder_name');// Nombre del titular
            $table->string('card_number');// Número de tarjeta
            $table->timestamp('expiration_date')->nullable();// Fecha de expiración
            $table->string('card_type')->enum('VISA','MASTERCARD','AMEX','OTHER');
            $table->decimal('available_balance', 12, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paymentmethods');
    }
};
