<!-- Servicio Crm Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('servicio_crm_id', 'Servicio:') !!}
    {!! Form::select('servicio_crm_id',$servicios,null,['class'=>'form-control','required']) !!}
    {!! Form::text('formulario_id', $formulario_id, ['class' => 'form-control hidden']) !!}


</div>


<!-- Estado Field -->
{{--<div class="form-group col-sm-6">--}}
{{--{!! Form::label('estado', 'Estado:') !!}--}}
{{--    {!! Form::text('estado', null, ['class' => 'form-control']) !!}--}}
{{--</div>--}}


<div class="form-group col-sm-6">
    {!! Form::label('APELLIDO_CLIENTE', 'APELLIDO_CLIENTE:') !!}
    {!! Form::select('APELLIDO_CLIENTE',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('NOMBRE_CLIENTE', 'NOMBRE_CLIENTE:') !!}
    {!! Form::select('NOMBRE_CLIENTE',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('telefono_contacto', 'TELEFONO_CONTACTO:') !!}
    {!! Form::select('TELEFONO_CONTACTO',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('EMAIL_CONTACTO', 'EMAIL_CONTACTO:') !!}
    {!! Form::select('EMAIL_CONTACTO',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('IDENTIFICACION_CLIENTE', 'IDENTIFICACION_CLIENTE:') !!}
    {!! Form::select('IDENTIFICACION_CLIENTE',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-12">

    {!! Form::label('eliminar', 'Eliminar sincronizacion:') !!}
    {!! Form::checkbox('eliminar')!!}

</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.formularios.index') !!}" class="btn btn-default">Cancelar</a>
</div>
