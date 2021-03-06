@extends('layouts.app')
@section('scripts')
    <script>
        $(document).ready(function () {
            $("#distribuidor").hide();
            $("#compania").hide();
            $(".roles").change(function (event) {
                if ($(".roles").val() == 1 || $(".roles").val() == 5) {
                    $("#compania").hide();
                    $("#compania_id").val("");
                    $("#compania_id").removeAttr("required");

                    $("#distribuidor").hide();
                    $("#distribuidor_id").val("");
                    $("#distribuidor_id").removeAttr("required");
                } else if ($(".roles").val() == 2) {
                    $("#distribuidor").hide();
                    $("#distribuidor_id").val("");
                    $("#distribuidor_id").removeAttr("required");

                    $("#compania").show();
                    $("#compania_id").attr("required", "required");
                } else if ($(".roles").val() == 6) {
                    $("#compania").hide();
                    $("#compania_id").val("");
                    $("#compania_id").removeAttr("required");

                    $("#distribuidor").show();
                    $("#distribuidor_id").attr("required", "required");


                }
            })
        })
    </script>

@endsection
@section('content')
    <section class="content-header">
        <h1>
            Usuario
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.users.store']) !!}

                    @include('admin.users.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
