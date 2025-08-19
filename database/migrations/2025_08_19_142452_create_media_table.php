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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
             $table->string('file_name');               // nombre original o generado
    $table->string('file_path');               // ruta de almacenamiento (ej: storage/app/public/…)
    $table->string('mime_type', 100);          // tipo de archivo (image/png, application/pdf, etc.)
    $table->unsignedBigInteger('size');        // tamaño en bytes
    $table->morphs('mediaable');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
