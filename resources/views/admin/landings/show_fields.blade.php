<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $landing->nombre !!}</p>
</div>

<!-- Landing Id Field -->
<div class="form-group">
    {!! Form::label('landing_id', 'Landing Id:') !!}
    <p>{!! $landing->landing_id !!}</p>
</div>

<!-- Db Name Field -->
<div class="form-group">
    {!! Form::label('db_name', 'Db Name:') !!}
    <p>{!! $landing->db_name !!}</p>
</div>

<!-- Fecha Sincronizacion Field -->
<div class="form-group">
    {!! Form::label('fecha_sincronizacion', 'Fecha Sincronizacion:') !!}
    <p>{!! $landing->fecha_sincronizacion !!}</p>
</div>

<!-- Fecha Ultimo Registro Field -->
<div class="form-group">
    {!! Form::label('fecha_ultimo_registro', 'Fecha Ultimo Registro:') !!}
    <p>{!! $landing->fecha_ultimo_registro !!}</p>
</div>

<!-- Activo Field -->
<div class="form-group">
    {!! Form::label('activo', 'Activo:') !!}
    <p>{!! $landing->activo !!}</p>
</div>

