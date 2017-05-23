@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            AsociacionCamposServicios
        </h1>
    </section>
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($asociacionCamposServicios, ['route' => ['admin.asociacionCamposServicios.update', $asociacionCamposServicios->id], 'method' => 'patch']) !!}

                        @include('admin.asociacionCamposServicios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@endsection