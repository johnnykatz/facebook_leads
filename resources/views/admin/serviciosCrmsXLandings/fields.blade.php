{!! Form::text('landing_id', $landing_id, ['class' => 'form-control hidden']) !!}
{!! Form::text('servicios_crm_id', $servicio->id, ['class' => 'form-control hidden']) !!}

@foreach($servicio->camposServiciosCrms as $campo)
    <div class="form-group col-sm-6">
        {!! Form::label($campo->nombre, $campo->nombre . ':') !!}
        {!! Form::select($campo->nombre, $campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}
    </div>
@endforeach

<div class="form-group col-sm-12">
    {!! Form::label('eliminar', 'Eliminar sincronizacion:') !!}
    {!! Form::checkbox('eliminar')!!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.serviciosCrmsXLandings.index') !!}" class="btn btn-default">Cancelar</a>
</div>
