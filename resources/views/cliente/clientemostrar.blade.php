@extends('plantillas.headeradmin')

@section('javascript')
<script type="text/javascript">


function setModal(btn){
    var cli_id = $(btn).attr( "cli_id" )

    var request = $.ajax({
        url: 'editar',
        type: 'GET',
        data: { cli_id: cli_id} ,
        contentType: 'application/json; charset=utf-8'
    });

    request.done(function(data) {
        $('#cli_id_editar').val(data.cli_id);
        $('#cli_nom_editar').val(data.cli_nom);

    });

    request.fail(function(jqXHR, textStatus) {
          alert(textStatus);
    });
}
</script>
@endsection

@section('content')

<div class="content">
    <div class="doc data-table-doc page-layout simple full-width">

        <!-- HEADER -->
        <div class="page-header bg-secondary text-auto p-6 row no-gutters align-items-center justify-content-between">
            <h2 class="doc-title" id="content">Todos los Clientes</h2>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#crearModal" data-whatever="@getbootstrap">Crear Cliente
                </button>

        </div>
         
        <div class="modal fade" id="crearModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="crear">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="recipient-name" class="form-control-label">Nombre de Cliente:</label>
                                <input type="text" class="form-control" id="recipient-name"  name="cli_nom"/>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Crear</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="editar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="cli_id" class="form-control-label">Id de Cliente:</label>
                                <input type="text" class="form-control" id="cli_id_editar"  name="cli_id" readonly />
                            </div>

                            <div class="form-group">
                                <label for="cli_nom" class="form-control-label">Nombre de Cliente:</label>
                                <input type="text" class="form-control" id="cli_nom_editar"  name="cli_nom"/>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary">Guardar Cambios</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (Session::has('creado'))
            <div class="alert alert-success" role="alert">
                {{Session::get('creado')}}
            </div>
        @endif

        @if (Session::has('editado'))
            <div class="alert alert-success" role="alert">
                {{Session::get('editado')}}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        @endif

        @if (Session::has('eliminado'))
            <div class="alert alert-success" role="alert">
                {{Session::get('eliminado')}}
            </div>
        @endif


        <div class="page-content p-6">
            <div class="content container">
                <div class="card col-md-8 col-mr-4">
                <div class="row">
                    <div class="col-12">
                        <div class="example ">
                            <div class="source-preview-wrapper">
                                <div class="preview">
                                    <div class="preview-elements">
                                        <table id="sample-data-table" class="table">
                                            <thead>
                                                <tr>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Id</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Nombre</span>
                                                        </div>
                                                    </th>
                                                    <th class="secondary-text">
                                                        <div class="table-header">
                                                            <span class="column-title">Acciones</span>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            @if(sizeof($clientes)>0)
                                            <tbody>                  
                                                @foreach ($clientes as $clies)
                                                    <tr>
                                                        <td>{{$clies->cli_id}}</td>
                                                        <td>{{$clies->cli_nom}}</td>
                                                        <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#editarModal"  cli_id="{{$clies->cli_id}}" onclick="setModal(this)"><i class="icon-lead-pencil" data-toggle="tooltip" data-placement="top" data-original-title="Editar">Editar</i>
                                                        </button>
                                                        <a href="eliminar?cli_id={{$clies->cli_id}}" class="btn btn-danger btn-fab fuse-ripple-ready" data-toggle="tooltip" data-placement="top" data-original-title="Eliminar">Eliminar<i class="icon-delete"></i></a>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <div class="alert alert-danger" role="alert">
                                                    No tienes Clientes creados
                                                </div>
                                            @endif
                                            </tbody>
                                        </table>
                                        <script type="text/javascript">
                                            $('#sample-data-table').DataTable({
                                            responsive: true
                                            });
                                        </script>

                                    </div>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>

       
    </div>
</div>

@endsection