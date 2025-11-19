@extends('template')

@section('content')

<div class="d-flex bd-highlight">
    <div class="p-2 w-100 bd-highlight">
        <h1>Grupos</h1>
    </div>
    <div class="p-2 flex-shrink-1 bd-highlight">
        <h1><a href="" class="btn btn-success btn-sm" type="button"  data-bs-toggle="modal" 
            data-bs-target="#modalGrupo" id="modal_show">Agregar</a></h1>
    </div>
</div>

<div class="card-box mb-30">

    <table class="table">
        <thead class="">
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Observación</th>
                <th>Status</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grupos as $grupo)
            <tr>
                <td>{{ $grupo->id }}</td>
                <td>{{ $grupo->tipoGrupo->descripcion }}</td>
                <td>{{ $grupo->descripcion }}</td>
                <td>{{ $grupo->status }}</td>
                <td>{{ $grupo->observacion }}</td>
                <td class="text-end">
                    <a href="{{ route('grupo.show', $grupo->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('grupo.edit', $grupo->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('grupo.destroy', $grupo->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este grupo?')">Eliminar</button>
                    </form> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modalGrupo" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Formulario POST normal -->
            <form action="{{ route('grupo.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Nuevo Grupo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Descripción</label>
                        <input type="text" name="descripcion" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">TIPO</label>
                        <select name="id_tipo" class="form-control" required>
                            <option value="" disabled selected>Seleccionar tipo</option>
                            @foreach($tipo_grupos as $tipo)
                                <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Observación</label>
                        <textarea name="observacion" class="form-control" rows="2"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
