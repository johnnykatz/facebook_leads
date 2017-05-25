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
    {!! Form::label('formulario', 'Formulario:') !!}
    {!! Form::select('formulario',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::select('apellido',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::select('nombre',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('timestamp', 'Timestamp:') !!}
    {!! Form::select('timestamp',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::select('direccion',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('concesionario', 'Concesionario:') !!}
    {!! Form::select('concesionario',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>


<div class="form-group col-sm-6">
    {!! Form::label('cedula', 'Cedula:') !!}
    {!! Form::select('cedula',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::select('email',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('telefono', 'Telefono:') !!}
    {!! Form::select('telefono',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}

</div>

<div class="form-group col-sm-6">
    {!! Form::label('ciudad', 'Ciudad:') !!}
    {!! Form::select('ciudad',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('habeas', 'Habeas:') !!}
    {!! Form::select('habeas',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('terminos', 'Terminos:') !!}
    {!! Form::select('terminos',$campos,null,['class'=>'form-control','placeholder'=>'seleccione...']) !!}
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
