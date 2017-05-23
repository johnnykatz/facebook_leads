<table class="table table-responsive" id="servicioCrms-table">
    <thead>
        <th>Nombre</th>
        <th>Slug</th>
        <th>Estado</th>
        <th>Crm Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($servicioCrms as $servicioCrm)
        <tr>
            <td>{!! $servicioCrm->nombre !!}</td>
            <td>{!! $servicioCrm->slug !!}</td>
            <td>{!! $servicioCrm->estado !!}</td>
            <td>{!! $servicioCrm->crm_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.servicioCrms.destroy', $servicioCrm->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.servicioCrms.show', [$servicioCrm->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.servicioCrms.edit', [$servicioCrm->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>