{!! Form::text('landing_id', $landing_id, ['class' => 'form-control hidden']) !!}

<div class="form-group col-sm-12">
    {!! Form::label('servicios_crm_id', 'Servicio:') !!}
    {!! Form::select('servicios_crm_id', ['' => ''] + $servicios, $landingServicio ? $landingServicio->id : null, ['class'=>'form-control','required', 'data-url' => route('admin.serviciosCrmsXLandings.recargarCampos', ['landing_id' => $landing_id, 'servicio_crm_id' => ''])]) !!}
</div>

<div id="campos-servicio">
    @if(isset($landingServicio))
        @include('admin.serviciosCrmsXLandings.campos_x_servicio')
    @endif
</div>
