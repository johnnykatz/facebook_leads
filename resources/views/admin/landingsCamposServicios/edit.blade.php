@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            LandingsCamposServicio
        </h1>
    </section>
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($landingsCamposServicio, ['route' => ['admin.landingsCamposServicios.update', $landingsCamposServicio->id], 'method' => 'patch']) !!}

                        @include('admin.landingsCamposServicios.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@endsection