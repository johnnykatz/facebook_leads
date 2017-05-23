<table class="table table-responsive" id="servicioCrmXFormularios-table">
    <thead>
        <th>Servicio Crm Id</th>
        <th>Formulario Id</th>
        <th>Estado</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($servicioCrmXFormularios as $servicioCrmXFormulario)
        <tr>
            <td>{!! $servicioCrmXFormulario->servicio_crm_id !!}</td>
            <td>{!! $servicioCrmXFormulario->formulario_id !!}</td>
            <td>{!! $servicioCrmXFormulario->estado !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.servicioCrmXFormularios.destroy', $servicioCrmXFormulario->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.servicioCrmXFormularios.show', [$servicioCrmXFormulario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.servicioCrmXFormularios.edit', [$servicioCrmXFormulario->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>