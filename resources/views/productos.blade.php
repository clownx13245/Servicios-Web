<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Productos</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>${{ number_format($producto->precio, 2) }}</td>
                    <td>
                        <span class="badge {{ $producto->estado == 'A' ? 'bg-success' : 'bg-danger' }}">
                            {{ $producto->estado == 'A' ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($productos->isEmpty())
        <div class="alert alert-warning">
            No hay productos registrados. 
            <a href="{{ route('categorias.index') }}" class="alert-link">Ver categorías</a>
        </div>
        @endif
    </div>
</body>
</html>