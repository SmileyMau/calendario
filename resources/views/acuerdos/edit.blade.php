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
    <form method="POST" enctype="multipart/form-data" action="{{ route('acuerdos.update',$acuerdos->id) }}">
    @csrf
    @method('PUT')
    <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label >Sesión</label>
                <select class="form-select  @error('id_sesion') is-invalid @enderror" id="validationCustom04" 
                required name="id_sesion" >
                    @foreach($sesiones as $sesion)
                        <option value="{{ $sesion->id }}">{{ $sesion->numero }}</option>
                    @endforeach
                </select>
                @error('id_sesion')
                    <div style="color: red; font-size: 12px;">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col-md-6">
              <label for="fecha" class="form-label">Fecha Limite</label>
              <input type="date" name="fecha_limite" id="fecha" class="form-control" value="{{$acuerdos->fecha_limite}}">
            </div>
            <div class="col-md-6">
              <label for="fecha" class="form-label">N° Acuerdo</label>
              <input type="number" name="num_acuerdo" id="fecha" class="form-control" value="{{$acuerdos->num_acuerdo}}">
            </div>
            <div class="col-md-6">
              <label  class="form-label">Nomenclatura</label>
              <input type="text" name="nomenclatura" id="numero" class="form-control" value="{{$acuerdos->nomenclatura}}">
            </div>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary" style="background-color: green">Guardar</button>
      
        </div>
    </form>
</div>
@endsection