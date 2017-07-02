<table class="table table-responsive" id="serviciosCrmsXLandings-table">
    <thead>
        <th>Servicios Crm Id</th>
        <th>Landing Id</th>
        <th>Estado</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($serviciosCrmsXLandings as $serviciosCrmsXLanding)
        <tr>
            <td>{!! $serviciosCrmsXLanding->servicios_crm_id !!}</td>
            <td>{!! $serviciosCrmsXLanding->landing_id !!}</td>
            <td>{!! $serviciosCrmsXLanding->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.serviciosCrmsXLandings.destroy', $serviciosCrmsXLanding->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.serviciosCrmsXLandings.show', [$serviciosCrmsXLanding->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.serviciosCrmsXLandings.edit', [$serviciosCrmsXLanding->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>