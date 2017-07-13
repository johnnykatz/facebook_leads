<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('endpoint', 'Endpoint:') !!}
    {!! Form::text('endpoint', null, ['class' => 'form-control']) !!}
</div>

<!-- Landing Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('landing_identificador', 'Campo Identificador:') !!}
    {!! Form::text('landing_identificador', null, ['class' => 'form-control']) !!}
</div>

<!-- Db Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campo_fecha', 'Campo Fecha:') !!}
    {!! Form::text('campo_fecha', null, ['class' => 'form-control']) !!}
</div>

<!-- Boolean Checkbox Activo Field checked by default -->
<div class="form-group col-sm-2">
    <label for="" class="control-label">Activo</label>
    <div class="clearfix"></div>
    <label class="radio-inline">
        {!! Form::radio('activo', 1, true, ['class' => 'icheckbox_minimal-blue radio']) !!} SI
    </label>
    <label class="radio-inline">
        {!! Form::radio('activo', 0, false, ['class' => 'icheckbox_minimal-blue radio']) !!} NO
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.landings.index') !!}" class="btn btn-default">Cancelar</a>
</div>
