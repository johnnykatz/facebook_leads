@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Configuración de Sincronización
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.serviciosCrmsXLandings.store']) !!}

                        @include('admin.serviciosCrmsXLandings.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <script type="application/javascript">
        $(document).ready(function(){
            $('#servicios_crm_id').on('change', function(e){var field = $(this);
               $.get(field.data('url') + '/' + field.val(), function(response){
                   $('#campos-servicio').html(response);
               });
            });
        });
    </script>
@endsection
