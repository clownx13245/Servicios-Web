<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla
    protected $table = 't_categorias';

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre',
        'estado'
    ];

    // Si no usas timestamps
    public $timestamps = true;
}