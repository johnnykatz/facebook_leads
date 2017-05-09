<div class="table-responsive">
    <table class="table table-responsive" id="formularios-table">
        <thead>
        <th>Nombre</th>
        <th>Form Id</th>
        <th>Nombre Tabla en DB</th>
        <th>Ultima sincronizaci&oacute;n</th>
        <th>Activo</th>
        <th>Con Estructura Creada</th>
        <th colspan="3">Acciones</th>
        </thead>
        <tbody>
        @foreach($formularios as $formulario)
            <tr>
                <td>{!! $formulario->nombre !!}</td>
                <td>{!! $formulario->form_id !!}</td>
                <td>{!! $formulario->db_name !!}</td>
                <td>{!! $formulario->fecha_sincronizacion !!}</td>
                <td>
                    @if($formulario->activo)
                        <span class="label label-success">SI</span>&nbsp;
                    @else
                        <span class="label label-danger">NO</span>&nbsp;
                    @endif
                </td>
                <td>
                    @if($formulario->con_estructura)
                        <span class="label label-success">SI</span>&nbsp;
                    @else
                        <span class="label label-danger">NO</span>&nbsp;
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['admin.formularios.destroy', $formulario->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.formularios.show', [$formulario->id]) !!}" class='btn btn-default'><i
                                    class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('admin.formularios.edit', [$formulario->id]) !!}" class='btn btn-default'><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        <a href="{!! route('admin.formularios.crear_estructura', [$formulario->id]) !!}"
                           class='btn btn-default' title="Crear estructura"><i
                                    class="glyphicon glyphicon-cog"></i></a>

                        <a href="{!! route('admin.formularios.listar_datos', [$formulario->id]) !!}" class='btn btn-default' title="Mostrar Leds"><i
                                    class="glyphicon glyphicon-list" ></i></a>



                        {{--                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>