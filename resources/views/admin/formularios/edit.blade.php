@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Formulario
        </h1>
    </section>
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($formulario, ['route' => ['admin.formularios.update', $formulario->id], 'method' => 'patch']) !!}

                        @include('admin.formularios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@endsection