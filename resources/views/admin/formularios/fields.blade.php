<!-- Nombre Field -->
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('nombre', 'Nombre:') !!}--}}
    {{--{!! Form::text('nombre', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Form Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('form_id', 'Form Id:') !!}
    {!! Form::text('form_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Activo Field -->
<div class="form-group col-sm-6">
    {{--{!! Form::label('activo', 'Activo:') !!}--}}
    {{--{!! Form::text('activo', null, ['class' => 'form-control']) !!}--}}

    {!! Form::label('activo', 'Activo:') !!}
    {!! Form::select('activo',[true=>'SI',false=>'NO'],(isset($formulario) && $formulario->visible==1)?1:0,['class'=>'form-control']) !!}

</div>



{{--<!-- Con Estructura Field -->--}}
{{--<div class="form-group col-sm-6">--}}
    {{--{!! Form::label('con_estructura', 'Con Estructura:') !!}--}}
    {{--{!! Form::text('con_estructura', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.formularios.index') !!}" class="btn btn-default">Cancelar</a>
</div>
