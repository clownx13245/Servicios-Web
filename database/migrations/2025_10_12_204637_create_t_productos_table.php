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
    Schema::create('t_productos', function (Blueprint $table) {
        $table->id(); // id – PK – autoincrementable
        $table->string('nombre');
        $table->string('categoria'); // Por simplicidad, lo haremos texto por ahora.
        $table->integer('stock'); // stock – entero
        $table->decimal('precio', 8, 2); // precio – decimal (8 dígitos en total, 2 decimales)
        $table->char('estado', 1)->default('A'); // estado – parametrizado (A/I)
        $table->timestamps(); // Esto crea las columnas created_at y updated_at automáticamente
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_productos');
    }
};
