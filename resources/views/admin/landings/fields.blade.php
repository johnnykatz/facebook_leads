<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Landing Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('landing_id', 'Landing Id:') !!}
    {!! Form::text('landing_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Db Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('db_name', 'Db Name:') !!}
    {!! Form::text('db_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Sincronizacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_sincronizacion', 'Fecha Sincronizacion:') !!}
    {!! Form::date('fecha_sincronizacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Ultimo Registro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_ultimo_registro', 'Fecha Ultimo Registro:') !!}
    {!! Form::date('fecha_ultimo_registro', null, ['class' => 'form-control']) !!}
</div>

<!-- Boolean Checkbox Activo Field checked by default -->
<div class="form-group col-sm-2">
    <label class="checkbox-inline">
        {!! Form::checkbox('activo', 1, true, ['class' => 'icheckbox_minimal-blue checkbox']) !!} Activo
        {{-- remove {, true} to make it unchecked by default --}}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.landings.index') !!}" class="btn btn-default">Cancel</a>
</div>
