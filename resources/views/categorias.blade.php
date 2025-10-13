<!DOCTYPE html>
<html>
<head>
    <title>Lista de Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Categorías</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>
                        <span class="badge {{ $categoria->estado == 'A' ? 'bg-success' : 'bg-danger' }}">
                            {{ $categoria->estado == 'A' ? 'Activo' : 'Inactivo' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($categorias->isEmpty())
        <div class="alert alert-warning">
            No hay categorías registradas.
        </div>
        @endif
    </div>
</body>
</html>