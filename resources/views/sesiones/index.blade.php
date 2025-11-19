@extends('template')
@section ('content')
<div class="d-flex bd-highlight">
    <div class="p-2 w-100 bd-highlight">
        <h1>Sesiones</h1>
    </div>
    <div class="p-2 flex-shrink-1 bd-highlight">
        <h1><a href="" class="btn btn-success btn-sm" type="button"  data-bs-toggle="modal" 
            data-bs-target="#exampleModal" id="modal_show">Agregar</a></h1>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Numero</th>
                    <th>Grupo</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Objetivo</th>
                    <th  class="text-center">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sesion as $sesiones)
                    <tr>
                        <td>{{ $sesiones->id }}</td>
                        <td>{{ $sesiones->numero }}</td>
                        <td>{{$sesiones->grupos->descripcion}}</td>
                        <td>{{ $sesiones->fecha }}</td>
                        <td>{{ $sesiones->descripcion }}</td>
                        <td>{{ $sesiones->objetivo }}</td>
                    <td class="text-center" style="min-width: 150px;">
                          <div class="dropdown">
                              <a class="btn btn-link" href="#" role="button" id="dropdownMenuButton{{ $sesiones->id }}" 
                                data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 25px;">
                                  <i class="dw dw-more"></i>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $sesiones->id }}">
                                  <li><a class="dropdown-item" href="{{ route('sesiones.show', $sesiones->id) }}">Ver</a></li>
                                  <li><a class="dropdown-item" href="{{ route('sesiones.edit', $sesiones->id) }}">Editar</a></li>
                                  <li class="pb-2 px-2">
                                    <form method="post" action="{{ route('sesiones.destroy', $sesiones->id) }}" >
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="dropdown-item btn-eliminar ">Eliminar</button>
                                    </form>
                                  </li> 
                              </ul>
                          </div>
                      </td>


                </tr>
                @endforeach
        </tbody>
    </table>
    </div>
</div>
<!-- Modal para agregar nuevas sesiones -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered"> 
    <div class="modal-content">
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" action="{{ route('sesiones.store') }}">
          @csrf

          <div class="row g-3 mb-3">
           
            <div class="col-md-6">
              <label for="fecha" class="form-label">Fecha</label>
              <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="numero" class="form-label">Número de sesión</label>
              <input type="number" name="numero" id="numero" class="form-control" placeholder="Ej. 12" required>
            </div>
            <div class="col-12" >
                <select class="form-select  @error('respon') is-invalid @enderror" id="validationCustom04" 
                required name="id_grupo" value="{{ old('respon') }} ">
                <option selected disabled value="">Selecciona el Grupo</option>
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
              <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Escribe una breve descripción..." required></textarea>
            </div>

            <div class="col-12">
              <label for="objetivo" class="form-label">Objetivo</label>
              <textarea name="objetivo" id="objetivo" class="form-control" rows="3" placeholder="Describe el objetivo de la sesión..." required></textarea>
            </div>
            
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>

        </form>
      </div>

    </div>
  </div>
</div>


@endsection