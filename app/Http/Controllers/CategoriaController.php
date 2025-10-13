<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Para la web
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    // Para API - GET /api/categorias
    public function apiIndex()
    {
        $categorias = Categoria::all();
        
        return response()->json([
            'success' => true,
            'data' => $categorias,
            'count' => $categorias->count()
        ]);
    }

    // Para API - GET /api/categorias/{id}
    public function show($id)
    {
        $categoria = Categoria::find($id);
        
        if (!$categoria) {
            return response()->json([
                'success' => false,
                'message' => 'Categoría no encontrada'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $categoria
        ]);
    }
}