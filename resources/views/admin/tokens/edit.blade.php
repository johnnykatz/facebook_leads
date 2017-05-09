@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Token
        </h1>
    </section>
    <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($token, ['route' => ['admin.tokens.update', $token->id], 'method' => 'patch']) !!}

                        @include('admin.tokens.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
    </div>
@endsection