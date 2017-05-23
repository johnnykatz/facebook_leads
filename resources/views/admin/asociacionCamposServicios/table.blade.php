<table class="table table-responsive" id="asociacionCamposServicios-table">
    <thead>
        <th>Campo Servicio Crm Id</th>
        <th>Campo Formulario</th>
        <th>Estado</th>
        <th>Formulario Id</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($asociacionCamposServicios as $asociacionCamposServicios)
        <tr>
            <td>{!! $asociacionCamposServicios->campoServicioCrm->nombre !!}</td>
            <td>{!! $asociacionCamposServicios->campo_formulario !!}</td>
            <td>{!! $asociacionCamposServicios->estado !!}</td>
            <td>{!! $asociacionCamposServicios->formulario->nombre !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.asociacionCamposServicios.destroy', $asociacionCamposServicios->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.asociacionCamposServicios.show', [$asociacionCamposServicios->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.asociacionCamposServicios.edit', [$asociacionCamposServicios->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>