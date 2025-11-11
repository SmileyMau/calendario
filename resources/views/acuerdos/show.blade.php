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
            <div>
                <a href="{{ route('acuerdos.edit', $acuerdos->id) }}" class="btn btn-primary me-2">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <a href="{{ route('acuerdos.index') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">
            <i class="bi bi-file-text-fill text-white"></i> Información General
        </h5>
    </div>

    <div class="card-body p-4">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="info-item mb-3">
                    <label class="text-muted small mb-1 d-block">
                        <i class="bi bi-calendar-event"></i> SESIÓN
                    </label>
                    <p class="fw-semibold mb-0">
                        {{ $acuerdos->sesion->numero }}<br>
                        <span class="text-muted">{{ $acuerdos->sesion->descripcion }}</span>
                    </p>
                </div>

                <div class="info-item mb-3">
                    <label class="text-muted small mb-1 d-block">
                        <i class="bi bi-hash"></i> N° ACUERDO
                    </label>
                    <p class="fw-semibold mb-0">{{ $acuerdos->num_acuerdo }}</p>
                </div>

                <div class="info-item mb-3">
                    <label class="text-muted small mb-1 d-block">
                        <i class="bi bi-calendar-check"></i> FECHA LÍMITE
                    </label>
                    <p class="fw-semibold mb-0">
                        @if($acuerdos->fecha_limite)
                            {{ \Carbon\Carbon::parse($acuerdos->fecha_limite)->format('d/m/Y') }}
                        @else
                            <span class="text-muted">No especificada</span>
                        @endif
                    </p>
                </div>

                <div class="info-item mb-3">
                    <label class="text-muted small mb-1 d-block">
                        <i class="bi bi-tag"></i> NOMENCLATURA
                    </label>
                    <p class="fw-semibold mb-0">
                        {{ $acuerdos->nomenclatura ?? 'N/A' }}
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="info-item">
                    <label class="text-muted small mb-2 d-block">
                        <i class="bi bi-people-fill"></i> RESPONSABLES
                    </label>
                    
                    @if($acuerdos->responsables && $acuerdos->responsables->count() > 0)
                        <div class="list-group">
                            @foreach($acuerdos->responsables as $responsable)
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="avatar-circle bg-primary text-white me-3">
                                        {{ strtoupper(substr($responsable->usuario->name, 0, 1)) }}{{ strtoupper(substr($responsable->usuario->last_name ?? '', 0, 1)) }}
                                    </div>
                                    <div>
                                        <p class="mb-0 fw-semibold">
                                            {{ $responsable->usuario->name }} {{ $responsable->usuario->last_name }}
                                        </p>
                                        @if($responsable->usuario->email)
                                            <small class="text-muted">
                                                <i class="bi bi-envelope"></i> {{ $responsable->usuario->email }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-warning mb-0">
                            <i class="bi bi-exclamation-triangle"></i> No hay responsables asignados
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 14px;
}

.list-group-item {
    border-left: 3px solid #0d6efd;
    transition: all 0.2s;
}

.list-group-item:hover {
    background-color: #f8f9fa;
    transform: translateX(5px);
}

.info-item label {
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}
</style>
@endsection