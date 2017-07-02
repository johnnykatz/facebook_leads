@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            ServiciosCrmsXLanding
        </h1>
    </section>
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($serviciosCrmsXLanding, ['route' => ['admin.serviciosCrmsXLandings.update', $serviciosCrmsXLanding->id], 'method' => 'patch']) !!}

                        @include('admin.serviciosCrmsXLandings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@endsection