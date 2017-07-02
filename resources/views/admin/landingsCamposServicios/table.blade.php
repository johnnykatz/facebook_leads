<table class="table table-responsive" id="landingsCamposServicios-table">
    <thead>
        <th>Campo Formulario</th>
        <th>Campos Servicios Crm Id</th>
        <th>Landing Id</th>
        <th>Estado</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($landingsCamposServicios as $landingsCamposServicio)
        <tr>
            <td>{!! $landingsCamposServicio->campo_formulario !!}</td>
            <td>{!! $landingsCamposServicio->campos_servicios_crm_id !!}</td>
            <td>{!! $landingsCamposServicio->landing_id !!}</td>
            <td>{!! $landingsCamposServicio->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.landingsCamposServicios.destroy', $landingsCamposServicio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.landingsCamposServicios.show', [$landingsCamposServicio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.landingsCamposServicios.edit', [$landingsCamposServicio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>