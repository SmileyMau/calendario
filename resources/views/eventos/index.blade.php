
@extends('template')
@section ('content')

<div class="card-box mb-30">
    <div class="pd-20">
       
    </div>
    <div class="pb-20">
        <table class="data-table table stripe hover nowrap">
            <thead>
                <tr>
                    <th class="">#</th>
                    <th>Titular</th>
                    <th>Correo</th>
                    <th>Titulo</th>
                    <th class="datatable-nosort">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                <tr>
                    <td class="">{{$evento->id}}</td>
                    <td>{{$evento->name . ' ' . $evento->last_name }}</td>
                    <td>{{$evento->email}}</td>
                    <td>{{$evento->titulo}}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown" >
                                <i class="dw dw-more"></i>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> Ver</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section ('js')
<script src="{{ asset('src/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('src/plugins/datatables/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('src/plugins/datatables/js/responsive.bootstrap4.min.js')}}"></script>
<!-- buttons for Export datatable -->
<script src="{{ asset('src/plugins/datatables/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('src/plugins/datatables/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('src/plugins/datatables/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('src/plugins/datatables/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('src/plugins/datatables/js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('src/plugins/datatables/js/pdfmake.min.js')}}"></script>
<script src="{{ asset('src/plugins/datatables/js/vfs_fonts.js')}}"></script>
<!-- Datatable Setting js -->
<script src="{{ asset('vendors/scripts/datatable-setting.js')}}"></script>
<script>

</script>
@endsection
