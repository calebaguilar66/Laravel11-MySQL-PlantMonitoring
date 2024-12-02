<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoreo de Sensores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Monitoreo de Sensores</h1>

        <!-- Formulario para establecer la frecuencia -->
        <form action="{{ route('configurar-frecuencia') }}" method="POST" class="mb-4">
            @csrf
            <div class="row g-3">
                <div class="col-md-8">
                    <label for="frecuencia" class="form-label">Frecuencia de Registro (segundos):</label>
                    <input type="number" name="frecuencia" id="frecuencia" class="form-control" min="1" value="{{ $frecuenciaActual ?? 6 }}" required>
                </div>
                <div class="col-md-4 align-self-end">
                    <button type="submit" class="btn btn-primary w-100">Actualizar Frecuencia</button>
                </div>
            </div>
        </form>

        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Humedad (%)</th>
                    <th>Temperatura (°C)</th>
                    <th>Fecha y Hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $index => $dato)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $dato->humedad }}</td>
                        <td>{{ $dato->temperatura }}</td>
                        <td>{{ $dato->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="/" class="btn btn-primary mt-3">Volver al Inicio</a>
    </div>
</body>
</html>
