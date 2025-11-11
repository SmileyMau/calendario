@extends('template')
@section ('content')
<div class="d-flex bd-highlight">
    <div class="p-2 w-100 bd-highlight">
        <h1>Acuerdos</h1>
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
                    <th>SESIÓN</th>
                    <th>NUMERO ACUERDO</th>
                    <th>NOMENCLATURA</th>
                    <th  class="text-center">OPCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($acuerdos as $acuerdo)
                    <tr>
                        <td>{{ $acuerdo->id }}</td>
                        <td>{{ $acuerdo->sesion->numero}}</td>
                        <td>{{ $acuerdo->num_acuerdo }}</td>
                        <td>{{ $acuerdo->nomenclatura }}</td>
                    <td class="text-center" style="min-width: 150px;">
                          <div class="dropdown">
                              <a class="btn btn-link" href="#" role="button" id="dropdownMenuButton{{ $acuerdo->id }}" 
                                data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 25px;">
                                  <i class="ti ti-article"></i>
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $acuerdo->id }}">
                                  <li><a class="dropdown-item" href="{{ route('acuerdos.show', $acuerdo->id) }}">Ver</a></li>
                                  <li><a class="dropdown-item" href="{{ route('acuerdos.edit', $acuerdo->id) }}">Editar</a></li>
                                  <li class="pb-2 px-2">
                                    <form method="post" action="{{ route('acuerdos.destroy', $acuerdo->id) }}" >
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
        <form method="POST" enctype="multipart/form-data" action="{{ route('acuerdos.store') }}">
          @csrf

          <div class="row g-3 mb-3">
             <div class="col-md-6">
                <label >Sesión</label>
                <select class="form-select  @error('id_sesion') is-invalid @enderror" id="validationCustom04" 
                required name="id_sesion" value="{{ old('id_sesion') }} ">
                <option selected disabled value="">Selecciona la Sesión</option>
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
              <input type="date" name="fecha_limite" id="fecha" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="fecha" class="form-label">N° Acuerdo</label>
              <input type="number" name="num_acuerdo" id="fecha" class="form-control" required>
            </div>
            <div class="col-md-6">
              <label for="numero" class="form-label">Nomenclatura</label>
              <input type="text" name="nomenclatura" id="numero" class="form-control" placeholder="Ej. 12" required>
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