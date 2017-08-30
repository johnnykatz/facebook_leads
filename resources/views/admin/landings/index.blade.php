@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Landings</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('admin.landings.create') !!}">Nuevo</a>
            <a href="{!! route('admin.reportes.reporte_landings') !!}" class="btn btn-success"
               style="margin-top: -10px;margin-bottom: 5px">Reportes</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('admin.landings.table')
            </div>
        </div>
    </div>
@endsection

