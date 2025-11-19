@extends('template')

@section('content')
<div class="container mt-4">
    <h1>Editar Grupo</h1>

    <form action="{{ route('grupo.update', $grupo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{ old('descripcion', $grupo->descripcion) }}" required>
            @error('descripcion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Tipo</label>
            <input type="text" class="form-control @error('id_tipo') is-invalid @enderror" id="status" name="id_tipo" value="{{ old('id_tipo', $grupo->id_tipo) }}" required>
            @error('id_tipo')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="observacion" class="form-label">Observación</label>
            <input type="text" class="form-control @error('observacion') is-invalid @enderror" id="observacion" name="observacion" value="{{ old('observacion', $grupo->observacion) }}">
            @error('observacion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('grupo.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
