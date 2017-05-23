<!-- Campo Servicio Crm Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campo_servicio_crm_id', 'Campo Servicio Crm Id:') !!}
    {!! Form::text('campo_servicio_crm_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Campo Formulario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campo_formulario', 'Campo Formulario:') !!}
    {!! Form::text('campo_formulario', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::text('estado', null, ['class' => 'form-control']) !!}
</div>

<!-- Formulario Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formulario_id', 'Formulario Id:') !!}
    {!! Form::text('formulario_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.asociacionCamposServicios.index') !!}" class="btn btn-default">Cancel</a>
</div>
