@extends('template')
@section ('content')
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
       <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">
                <i class="bi bi-building-fill text-white"></i> Información General
            </h5>
        </div>

        <div class="card-body p-4">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="info-item mb-3">
                        <label class="text-muted small mb-1">SESIÓN</label>
                        <p class="fw-semibold mb-0">{{$acuerdos->sesion->numero}}<br> {{$acuerdos->sesion->descripcion}} </p>
                    </div>
                    <div class="info-item mb-3">
                        <label class="text-muted small mb-1">N° ACUERDO</label>
                        <p class="fw-semibold mb-0"> {{$acuerdos->num_acuerdo}}</p>
                    </div>
                    <div class="info-item mb-3">
                        <label class="text-muted small mb-1">FECHA LIMITE</label>
                        <p class="fw-semibold mb-0">{{$acuerdos->fecha_limite}} </p>
                    </div>
                    <div class="info-item mb-3">
                        <label class="text-muted small mb-1">NOMENCLATURA</label>
                        <p class="fw-semibold mb-0"> {{$acuerdos->nomenclatura}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection