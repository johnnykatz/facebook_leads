@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            CampoServicioCrm
        </h1>
    </section>
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($campoServicioCrm, ['route' => ['admin.campoServicioCrms.update', $campoServicioCrm->id], 'method' => 'patch']) !!}

                        @include('admin.campoServicioCrms.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@endsection