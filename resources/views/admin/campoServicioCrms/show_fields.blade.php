<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $campoServicioCrm->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $campoServicioCrm->nombre !!}</p>
</div>

<!-- Servicio Crm Id Field -->
<div class="form-group">
    {!! Form::label('servicio_crm_id', 'Servicio Crm Id:') !!}
    <p>{!! $campoServicioCrm->servicio_crm_id !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $campoServicioCrm->estado !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $campoServicioCrm->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $campoServicioCrm->updated_at !!}</p>
</div>

