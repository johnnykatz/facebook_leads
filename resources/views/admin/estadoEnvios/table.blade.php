<table class="table table-responsive" id="estadoEnvios-table">
    <thead>
        <th>Nombre</th>
        <th>Slug</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($estadoEnvios as $estadoEnvio)
        <tr>
            <td>{!! $estadoEnvio->nombre !!}</td>
            <td>{!! $estadoEnvio->slug !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.estadoEnvios.destroy', $estadoEnvio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.estadoEnvios.show', [$estadoEnvio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.estadoEnvios.edit', [$estadoEnvio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>