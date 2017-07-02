<!-- Campo Formulario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campo_formulario', 'Campo Formulario:') !!}
    {!! Form::text('campo_formulario', null, ['class' => 'form-control']) !!}
</div>

<!-- Boolean Checkbox Estado Field checked by default -->
<div class="form-group col-sm-2">
    <label class="checkbox-inline">
        {!! Form::checkbox('estado', 1, true, ['class' => 'icheckbox_minimal-blue checkbox']) !!} Estado
        {{-- remove {, true} to make it unchecked by default --}}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.landingsCamposServicios.index') !!}" class="btn btn-default">Cancel</a>
</div>
