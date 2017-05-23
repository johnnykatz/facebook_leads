<!-- Formulario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formulario_id', 'Formulario Id:') !!}
    {!! Form::text('formulario_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Servicio Crm Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('servicio_crm_id', 'Servicio Crm Id:') !!}
    {!! Form::text('servicio_crm_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Registro Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('registro_id', 'Registro Id:') !!}
    {!! Form::text('registro_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.formularioEnviadoXServicios.index') !!}" class="btn btn-default">Cancel</a>
</div>
