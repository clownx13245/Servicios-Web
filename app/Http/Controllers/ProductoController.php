<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
        // Recibir la cantidad por parámetro en el request body
        $perPage = $request->input('cantidad'); // 'cantidad' es el nombre del parámetro
        
        // Validar que sea un número válido
        if (!is_numeric($perPage) || $perPage < 1 || $perPage > 100) {
            return response()->json([
                'success' => false,
                'message' => 'No se encontraron páginas. Por favor ingrese un número de páginas válido (mayor a 0)'
            ], 400);
        }
            // Convertir a entero
            $perPage = (int)$perPage;
            
            // Paginar productos con categoría
            $productos = Producto::with('categoria')
                                ->paginate($perPage);
            
            return response()->json([
                'success' => true,
                'data' => $productos->items(),
                'pagination' => [
                    'current_page' => $productos->currentPage(),
                    'per_page' => $productos->perPage(),
                    'total' => $productos->total(),
                    'last_page' => $productos->lastPage(),
                    'from' => $productos->firstItem(),
                    'to' => $productos->lastItem()
                ]
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener productos: ' . $e->getMessage()
            ], 500);
        }
    }

    // Los demás métodos (store, show, update, destroy) se mantienen igual...
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'categoria_id' => 'required|exists:t_categorias,id',
                'stock' => 'required|integer|min:0',
                'precio' => 'required|numeric|min:0',
                'estado' => 'required|in:A,I'
            ]);

            $producto = Producto::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Producto creado exitosamente',
                'data' => $producto->load('categoria')
            ], 201);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear producto: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $producto = Producto::with('categoria')->find($id);
            
            if (!$producto) {
                return response()->json([
                    'success' => false,
                    'message' => 'Producto no encontrado'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $producto
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener producto: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $producto = Producto::find($id);
            
            if (!$producto) {
                return response()->json([
                    'success' => false,
                    'message' => 'Producto no encontrado'
                ], 404);
            }

            $validated = $request->validate([
                'nombre' => 'sometimes|string|max:255',
                'categoria_id' => 'sometimes|exists:t_categorias,id',
                'stock' => 'sometimes|integer|min:0',
                'precio' => 'sometimes|numeric|min:0',
                'estado' => 'sometimes|in:A,I'
            ]);

            $producto->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Producto actualizado exitosamente',
                'data' => $producto->load('categoria')
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar producto: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $producto = Producto::find($id);
            
            if (!$producto) {
                return response()->json([
                    'success' => false,
                    'message' => 'Producto no encontrado'
                ], 404);
            }

            $producto->delete();

            return response()->json([
                'success' => true,
                'message' => 'Producto eliminado exitosamente'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar producto: ' . $e->getMessage()
            ], 500);
        }
    }
}






















































