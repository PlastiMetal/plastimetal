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
        Schema::create('ingreso', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_comprobante', 20);
            $table->string('num_comprobante', 100);
            $table->dateTime('fecha_hora', 0);
            $table->decimal('impuesto', 4, 2);
            $table->string('estatus', 20);
            $table->unsignedBigInteger('proveedor_id');
            $table->timestamps();
            $table->foreign('proveedor_id')->references('id')->on('persona')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingreso');
    }
};
