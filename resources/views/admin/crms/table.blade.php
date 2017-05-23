<table class="table table-responsive" id="crms-table">
    <thead>
        <th>Nombre</th>
        <th>Endpoint</th>
        <th>Estado</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($crms as $crm)
        <tr>
            <td>{!! $crm->nombre !!}</td>
            <td>{!! $crm->endpoint !!}</td>
            <td>{!! $crm->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.crms.destroy', $crm->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.crms.show', [$crm->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.crms.edit', [$crm->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>