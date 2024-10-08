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
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_persona', 20);
            $table->string('nombre', 100);
            $table->string('tipo_documento', 20);
            $table->string('num_documento', 25);
            $table->string('direccion', 100);
            $table->string('telefono', 9);
            $table->string('email', 50);
            $table->string('estatus', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persona');
    }
};
