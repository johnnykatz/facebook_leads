<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Tipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo', 'Tipo:') !!}
    {!! Form::text('tipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Requerido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requerido', 'Requerido:') !!}
    {!! Form::text('requerido', null, ['class' => 'form-control']) !!}
</div>

<!-- Requerido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codifica', 'Codifica:') !!}
    {!! Form::text('codifica', null, ['class' => 'form-control']) !!}
</div>


<!-- Servicio Crm Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('servicio_crm_id', 'Servicio Crm Id:') !!}
    {!! Form::text('servicio_crm_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.campoServicioCrms.index') !!}" class="btn btn-default">Cancel</a>
</div>
