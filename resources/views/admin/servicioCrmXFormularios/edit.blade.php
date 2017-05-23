@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            ServicioCrmXFormulario
        </h1>
    </section>
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($servicioCrmXFormulario, ['route' => ['admin.servicioCrmXFormularios.update', $servicioCrmXFormulario->id], 'method' => 'patch']) !!}

                        @include('admin.servicioCrmXFormularios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@endsection