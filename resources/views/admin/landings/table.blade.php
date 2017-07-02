<table class="table table-responsive" id="landings-table">
    <thead>
        <th>Nombre</th>
        <th>Nombre Tabla en DB</th>
        <th>Fecha Última Sincronización</th>
        <th>Activo</th>
        <th colspan="3">Acciones</th>
    </thead>
    <tbody>
    @foreach($landings as $landing)
        <tr>
            <td>{!! $landing->nombre !!}</td>
            <td>{!! $landing->db_name !!}</td>
            <td>{!! $landing->fecha_sincronizacion !!}</td>
            <td>
                @if($landing->activo)
                    <span class="label label-success">SI</span>&nbsp;
                @else
                    <span class="label label-danger">NO</span>&nbsp;
                @endif
            </td>
            <td>
                {!! Form::open(['route' => ['admin.landings.destroy', $landing->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.landings.show', [$landing->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.landings.edit', [$landing->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('admin.landings.listar_datos', [$landing->id]) !!}"
                       class='btn btn-default' title="Mostrar Datos"><i
                                class="glyphicon glyphicon-list"></i></a>
                    @if(count($landing->serviciosCrmsXLandings)==0)
                        <a href="{!! route('admin.serviciosCrmsXLandings.create', [$landing->id]) !!}"
                           class='btn btn-default' title="Configurar Sincronizacion"><i
                                    class="glyphicon glyphicon-cloud"></i></a>
                    @else
                        <a href="{!! route('admin.serviciosCrmsXLandings.create', [$landing->id]) !!}"
                           class='btn btn-success' title="Configurar Sincronizacion"><i
                                    class="glyphicon glyphicon-cloud"></i></a>
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
