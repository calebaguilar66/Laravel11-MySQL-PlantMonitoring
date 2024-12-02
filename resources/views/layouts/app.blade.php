<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoreo de Orquídeas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('monitoreo.datos') }}">Monitoreo de Orquídeas</a>
            <a class="navbar-brand" href="{{ route('calendario.index') }}">Calendario de Riego</a>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    
    <script>
        // Función para mostrar pop-ups
        async function mostrarNotificaciones() {
            try {
                const response = await fetch("{{ route('notificaciones.ver') }}");
                const notificaciones = await response.json();

                notificaciones.forEach((notificacion) => {
                    alert(notificacion.mensaje); // Pop-up de alerta
                });
            } catch (error) {
                console.error('Error al cargar notificaciones:', error);
            }
        }

        // Ejecutar al cargar la página
        mostrarNotificaciones();
    </script>



</body>
</html>
