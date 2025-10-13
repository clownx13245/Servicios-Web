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
        Schema::create('t_categorias', function (Blueprint $table) {
            $table->id(); // id - PK autoincremental
            $table->string('nombre'); // nombre - VARCHAR
            $table->enum('estado', ['A', 'I'])->default('A'); // estado - ENUM (A=Activo, I=Inactivo)
            $table->timestamps(); // created_at y updated_at
        });

        // Insertar datos iniciales
        DB::table('t_categorias')->insert([
            ['nombre' => 'Alimentos', 'estado' => 'A'],
            ['nombre' => 'Tecnología', 'estado' => 'A'],
            ['nombre' => 'Juguetería', 'estado' => 'A'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_categorias');
    }
};