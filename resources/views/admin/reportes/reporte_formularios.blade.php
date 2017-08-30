@extends('layouts.app')
@section("scripts")
    <script>
        $(document).ready(function () {
            inicializarDateRange();
            $('#btn-exportar-excel').click(function () {
                $('#form_listado').attr('target', '_blank');
                $('#form_listado').attr('action', '{!! route('admin.reportes.excelReporteFormularios') !!}');
                $('#form_listado').submit();
                $('#form_listado').removeAttr('target');
                $('#form_listado').removeAttr('action');

            });
        })

    </script>
@endsection
@section('content')
    <section class="content-header">
        <h1 class="pull-left">Reporte de formularios de Facebook</h1>
        <h1 class="pull-right">
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="box box-primary">
            <div class="box-body">
                {!! Form::model(Request::all(),['route'=>'admin.reportes.excelReporteFormularios','method'=>'GET','class'=>'form-horizontal','id'=>'form_listado']) !!}
                <div class="form-group">
                    {!! Form::label('fecha', 'Fecha de creación del leads:',['class'=>'col-sm-3 control-label']) !!}
                    <div class="col-sm-4">
                        {!! Form::text('fecha',(isset($filtro['fecha']))? $filtro['fecha']:'',['class'=>'form-control daterange']) !!}
                    </div>

                    <button class="btn btn-success btn-label-left" type="button" id="btn-exportar-excel"
                            title="exportar excel">
                                <span>
                                    <i class="fa fa-file-excel-o"></i>
                                </span>
                    </button>

                </div>

                <div class="form-group col-sm-3 pull-right">
                    {{--{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}--}}

                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-responsive" id="formularios-table">
                        <thead>
                        <th>Seleccionar</th>
                        <th>Nombre</th>
                        <th>Form id</th>
                        <th>Activo</th>
                        </thead>
                        <tbody>
                        @foreach($formularios as $formulario)
                            <tr>
                                <td>
                                    {!!Form::checkbox('formulario[]', $formulario->id,null,['id'=>$formulario->id]) !!}
                                </td>
                                <td>{!! $formulario->nombre !!} </td>
                                <td>{!! $formulario->form_id !!} </td>
                                <td>
                                    @if($formulario->activo)
                                        <span class="label label-success">SI</span>&nbsp;
                                    @else
                                        <span class="label label-danger">NO</span>&nbsp;
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="box-footer">
                <div class="form-group col-sm-12">
                    <a href="{!! route('admin.formularios.index') !!}" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection



