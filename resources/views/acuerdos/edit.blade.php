@extends('template')
@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="mb-1">Detalles de Acuerdo</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('acuerdos.index') }}">Acuerdos</a></li>
                        <li class="breadcrumb-item active">{{ $acuerdos->num_acuerdo }}</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ route('acuerdos.index') }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Volver
            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('acuerdos.update', $acuerdos->id) }}">
            @csrf
            @method('PUT')
            
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="id_sesion" class="form-label">Sesión</label>
                    <select class="form-select @error('id_sesion') is-invalid @enderror" 
                            id="id_sesion" 
                            name="id_sesion" 
                            required>
                        @foreach($sesiones as $sesion)
                            <option value="{{ $sesion->id }}" 
                                {{ old('id_sesion', $acuerdos->id_sesion) == $sesion->id ? 'selected' : '' }}>
                                {{ $sesion->numero }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_sesion')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="fecha_limite" class="form-label">Fecha Límite</label>
                    <input type="date" 
                           name="fecha_limite" 
                           id="fecha_limite" 
                           class="form-control @error('fecha_limite') is-invalid @enderror" 
                           value="{{ old('fecha_limite', $acuerdos->fecha_limite) }}">
                    @error('fecha_limite')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="num_acuerdo" class="form-label">N° Acuerdo</label>
                    <input type="number" 
                           name="num_acuerdo" 
                           id="num_acuerdo" 
                           class="form-control @error('num_acuerdo') is-invalid @enderror" 
                           value="{{ old('num_acuerdo', $acuerdos->num_acuerdo) }}"
                           required>
                    @error('num_acuerdo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nomenclatura" class="form-label">Nomenclatura</label>
                    <input type="text" 
                           name="nomenclatura" 
                           id="nomenclatura" 
                           class="form-control @error('nomenclatura') is-invalid @enderror" 
                           value="{{ old('nomenclatura', $acuerdos->nomenclatura) }}">
                    @error('nomenclatura')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label class="form-label">Responsables</label>
                    <div id="document-container">
                        @php
                      
                            $responsablesSeleccionados = old('id_responsable');
                            
                     
                            if (!$responsablesSeleccionados && isset($acuerdos->responsables)) {
                                $responsablesSeleccionados = $acuerdos->responsables->pluck('id_usuario')->toArray();
                            }
                            
                        
                            if (empty($responsablesSeleccionados)) {
                                $responsablesSeleccionados = [''];
                            }
                        @endphp

                        @foreach($responsablesSeleccionados as $index => $responsable_id)
                            <div class="document-group mb-2 d-flex gap-2 align-items-center">
                                <select class="form-select @error('id_responsable.' . $index) is-invalid @enderror" 
                                        name="id_responsable[]" 
                                        required>
                                    <option value="">Seleccione un responsable</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{ $usuario->id }}" 
                                            {{ $responsable_id == $usuario->id ? 'selected' : '' }}>
                                            {{ $usuario->name }} {{ $usuario->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-outline-danger btn-sm remove-responsable">
                                    <i class="bi bi-x-circle"></i>
                                </button>
                                @error('id_responsable.' . $index)
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-success btn-sm" id="add-document-btn">
                            <i class="bi bi-plus-circle"></i> Agregar Responsable
                        </button>
                    </div>
                </div>
            </div>

            <div class="text-end mt-3">
                <a href="{{ route('acuerdos.index') }}" class="btn btn-secondary">
                    <i class="bi bi-x-circle"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('document-container');
        
        // Agregar nuevo responsable
        document.getElementById('add-document-btn').addEventListener('click', function () {
            const newGroup = document.createElement('div');
            newGroup.className = 'document-group mb-2 d-flex gap-2 align-items-center';
            newGroup.innerHTML = `
                <select class="form-select" name="id_responsable[]" required>
                    <option value="">Seleccione un responsable</option>
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}">{{ $usuario->name }} {{ $usuario->last_name }}</option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-outline-danger btn-sm remove-responsable">
                    <i class="bi bi-x-circle"></i>
                </button>
            `;
            container.appendChild(newGroup);
        });
        
        // Eliminar responsable (delegación de eventos)
        container.addEventListener('click', function(e) {
            if (e.target.closest('.remove-responsable')) {
                const group = e.target.closest('.document-group');
                // No permitir eliminar si es el último responsable
                const totalGroups = container.querySelectorAll('.document-group').length;
                if (totalGroups > 1) {
                    group.remove();
                } else {
                    alert('Debe haber al menos un responsable');
                }
            }
        });
    });
</script>
@endsection