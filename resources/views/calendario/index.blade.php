@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Configurar Horario de Riego</h1>

    <!-- Mostrar mensajes de éxito -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulario para configurar riego -->
    <form action="{{ route('calendario.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" name="hora" id="hora" class="form-control" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

    <!-- Mostrar horarios configurados -->
    <h2 class="mt-5">Horarios Configurados</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Creado el</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calendarios as $calendario)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $calendario->fecha }}</td>
                    <td>{{ $calendario->hora }}</td>
                    <td>{{ $calendario->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
