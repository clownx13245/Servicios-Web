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
            $table->unsignedBigInteger('categoria_id')->constrained('t_categorias')->onDelete('cascade'); // categoría – FK
            $table->integer('stock'); // stock – entero
            $table->decimal('precio', 10, 2); // precio – decimal (8 dígitos total, 2 decimales)
            $table->enum('estado', ['A', 'I'])->default('A'); // estado – parametrizado (A/I)
            
            $table->timestamps();

            // Clave foránea para categoría
            $table->foreign('categoria_id')->references('id')->on('t_categorias');
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
