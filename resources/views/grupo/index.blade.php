@extends('template')

@section('content')

 <h4>Lista de Grupos</h4>
 <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalGrupo"> Agregar Grupo</button>    

<div class="card-box mb-30">

    <table class="table">
        <thead class="">
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Status</th>
                <th>Observación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($grupos as $grupo)
            <tr>
                <td>{{ $grupo->id }}</td>
                <td>{{ $grupo->descripcion }}</td>
                <td>{{ $grupo->status }}</td>
                <td>{{ $grupo->observacion }}</td>
                <td class="text-end">
                    <a href="{{ route('grupo.show', $grupo->id) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('grupo.edit', $grupo->id) }}" class="btn btn-sm btn-warning">Editar</a>
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
                        <label class="form-label">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="" disabled selected>Seleccionar status</option>
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
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
