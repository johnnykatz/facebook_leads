<table class="table table-responsive" id="formularioEnviadoXServicios-table">
    <thead>
        <th>Formulario Id</th>
        <th>Servicio Crm Id</th>
        <th>Registro Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($formularioEnviadoXServicios as $formularioEnviadoXServicio)
        <tr>
            <td>{!! $formularioEnviadoXServicio->formulario_id !!}</td>
            <td>{!! $formularioEnviadoXServicio->servicio_crm_id !!}</td>
            <td>{!! $formularioEnviadoXServicio->registro_id !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.formularioEnviadoXServicios.destroy', $formularioEnviadoXServicio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.formularioEnviadoXServicios.show', [$formularioEnviadoXServicio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.formularioEnviadoXServicios.edit', [$formularioEnviadoXServicio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>