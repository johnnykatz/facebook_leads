@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            EstadoEnvio
        </h1>
    </section>
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($estadoEnvio, ['route' => ['admin.estadoEnvios.update', $estadoEnvio->id], 'method' => 'patch']) !!}

                        @include('admin.estadoEnvios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@endsection