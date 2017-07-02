<table class="table table-responsive" id="landingsEnviadosXServicios-table">
    <thead>
        <th>Servicios Crm Id</th>
        <th>Landing Id</th>
        <th>Estados Envio Id</th>
        <th>Registro Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($landingsEnviadosXServicios as $landingsEnviadosXServicio)
        <tr>
            <td>{!! $landingsEnviadosXServicio->servicios_crm_id !!}</td>
            <td>{!! $landingsEnviadosXServicio->landing_id !!}</td>
            <td>{!! $landingsEnviadosXServicio->estados_envio_id !!}</td>
            <td>{!! $landingsEnviadosXServicio->registro_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.landingsEnviadosXServicios.destroy', $landingsEnviadosXServicio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.landingsEnviadosXServicios.show', [$landingsEnviadosXServicio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.landingsEnviadosXServicios.edit', [$landingsEnviadosXServicio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>