@extends('template')
@section ('content')
 <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="mb-1">Detalles de Sesión</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('sesiones.index') }}">Sesiones</a></li>
                            <li class="breadcrumb-item active">{{ $sesion->numero }}</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('sesiones.index') }}" class="btn btn-outline-primary">
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
                        <label class="text-muted small mb-1">GRUPO</label>
                        <p class="fw-semibold mb-0"> </p>
                    </div>
                    <div class="info-item mb-3">
                        <label class="text-muted small mb-1">FECHA</label>
                        <p class="fw-semibold mb-0">{{$sesion->fecha}} </p>
                    </div>
                    <div class="info-item mb-3">
                        <label class="text-muted small mb-1">DESCRIPCIÓN</label>
                        <p class="fw-semibold mb-0"> {{$sesion->descripcion}}</p>
                    </div>
                    <div class="info-item mb-3">
                        <label class="text-muted small mb-1">OBJETIVO</label>
                        <p class="fw-semibold mb-0">{{$sesion->objetivo}} </p>
                    </div>
                    <div class="info-item mb-3">
                        <label class="text-muted small mb-1">NUMERO</label>
                        <p class="fw-semibold mb-0"> {{$sesion->numero}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection