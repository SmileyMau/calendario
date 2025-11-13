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
    <form method="POST" enctype="multipart/form-data" action="{{ route('sesiones.update',$sesion->id) }}">
    @csrf
    @method('PUT')
    <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{$sesion->fecha}}">
            </div>
            <div class="col-md-6">
                <label for="numero" class="form-label">Número de sesión</label>
                <input type="number" name="numero" id="numero" class="form-control" placeholder="Ej. 12" value="{{$sesion->numero}}" >
            </div>
            <div class="col-12" >
                <select class="form-select  @error('respon') is-invalid @enderror" id="validationCustom04" 
                required name="id_grupo" value="{{ old('respon') }} ">
                    @foreach($grupos as $grupo)
                        <option value="{{ $grupo->id }}">{{ $grupo->descripcion }} </option>
                    @endforeach
                </select>
                @error('respon')
                    <div style="color: red; font-size: 12px;">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="col-12">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="3"   >{{$sesion->descripcion}}</textarea>
            </div>

            <div class="col-12">
                <label for="objetivo" class="form-label">Objetivo</label>
                <textarea name="objetivo" id="objetivo" class="form-control" rows="3" >{{$sesion->objetivo}}</textarea>
            </div>
            
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary" style="background-color: green">Guardar</button>
      
        </div>
    </form>
    </div>
</div>
@endsection