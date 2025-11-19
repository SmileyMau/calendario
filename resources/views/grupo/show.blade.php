@extends('template')

@section('content')
<div class="container mt-4">
    <h1>Detalle del Grupo</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Descripción: {{ $grupo->descripcion }}</h5>
            <p class="card-text"><strong>Tipo:</strong> {{ $grupo->tipoGrupo->descripcion }}</p>
            <p class="card-text"><strong>Observación:</strong> {{ $grupo->observacion }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $grupo->status }}</p>
        </div>
    </div>

    <a href="{{ route('grupo.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
    <a href="{{ route('grupo.edit', $grupo->id) }}" class="btn btn-warning mt-3">Editar Grupo</a>
</div>
@endsection
