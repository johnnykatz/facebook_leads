<table class="table table-responsive" id="campoServicioCrms-table">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Servicio Crm Id</th>
        <th>Estado</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($campoServicioCrms as $campoServicioCrm)
        <tr>
            <td>{!! $campoServicioCrm->id !!}</td>
            <td>{!! $campoServicioCrm->nombre !!}</td>
            <td>{!! $campoServicioCrm->servicio_crm_id !!}</td>
            <td>{!! $campoServicioCrm->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.campoServicioCrms.destroy', $campoServicioCrm->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.campoServicioCrms.show', [$campoServicioCrm->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.campoServicioCrms.edit', [$campoServicioCrm->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>