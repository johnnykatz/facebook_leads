@extends('layouts.app')
@section('scripts')
    {{--<script>--}}
    {{--$(document).ready(function () {--}}
    {{--inicializarFecha();--}}
    {{--})--}}
    {{--</script>--}}

@endsection

@section('content')
    <section class="content-header">
        <h1>
            Importar productos
        </h1>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.importar.importar','files'=>true]) !!}

                    {{--<div class="form-group col-sm-6">--}}
                        {{--{!! Form::label('lista_precio_1', ' Lista precios 1:',['class'=>'col-sm-6 control-label']) !!}--}}

                        {{--{!! Form::select('lista_precio_1',$listas_precios,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}--}}
                    {{--</div>--}}
                    <div class="form-group col-sm-2">
                        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                           href="{!! route('getTransaccion') !!}">GetTransaccion</a>
                    </div>
                    <div class="form-group col-sm-2">
                        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px"
                           href="{!! route('topUp') !!}">TopUp</a>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
