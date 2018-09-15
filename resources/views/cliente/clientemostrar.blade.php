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

var DatatableBasic = function() {


    //
    // Setup module components
    //

    // Basic Datatable examples
    var _componentDatatableBasic = function() {
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }

        // Setting datatable defaults
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            columnDefs: [{ 
                orderable: false,
                width: 100,
                targets: [ 2 ]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });

        // Basic datatable
        $('.datatable-basic').DataTable();

        // Alternative pagination
        $('.datatable-pagination').DataTable({
            pagingType: "simple",
            language: {
                paginate: {'next': $('html').attr('dir') == 'rtl' ? 'Next &larr;' : 'Next &rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr; Prev' : '&larr; Prev'}
            }
        });

        // Datatable with saving state
        $('.datatable-save-state').DataTable({
            stateSave: true
        });

        // Scrollable datatable
        var table = $('.datatable-scroll-y').DataTable({
            autoWidth: true,
            scrollY: 300
        });

        // Resize scrollable table when sidebar width changes
        $('.sidebar-control').on('click', function() {
            table.columns.adjust().draw();
        });
    };

    // Select2 for length menu styling
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        // Initialize
        $('.dataTables_length select').select2({
            minimumResultsForSearch: Infinity,
            dropdownAutoWidth: true,
            width: 'auto'
        });
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentDatatableBasic();
            _componentSelect2();
        }
    }
}();


// Initialize module
// ------------------------------

document.addEventListener('DOMContentLoaded', function() {
    DatatableBasic.init();
});



</script>

<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>


@endsection

@section('content')
            <div class="mb-12">
                <div class="page-header page-header-light border-bottom-2 border-bottom-teal" style="border-top: 1px solid #ddd; border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h5>
                                <i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Page</span> - Header
                                <small class="d-block text-muted">Large <code>bottom</code> border with custom color</small>
                            </h5>
                        </div>
                    </div>

                    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                        <div class="d-flex">
                            <div class="breadcrumb">
                                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                                <a href="components_page_header.html" class="breadcrumb-item">Current</a>
                                <span class="breadcrumb-item active">Location</span>
                            </div>

                            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                        </div>

                        <div class="header-elements d-none">
                            <div class="breadcrumb justify-content-center">
                                <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu7"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                                    <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                        

                                        <table class="table datatable-basic">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Id
                                                    </th>
                                                    <th>
                                                        Nombre
                                                    </th>
                                                    <th>
                                                        Acciones
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