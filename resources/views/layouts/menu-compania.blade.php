
<li class="{{ Request::is('marcas*') ? 'active' : '' }}">
    <a href="{!! route('admin.marcas.index') !!}"><i class="fa fa-edit"></i><span>Marcas</span></a>
</li>
<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{!! route('admin.productos.index') !!}"><i class="fa fa-edit"></i><span>Productos</span></a>
</li>

{{--<li class="{{ Request::is('ofertas*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.ofertas.index') !!}"><i class="fa fa-edit"></i><span>Ofertas</span></a>--}}
{{--</li>--}}


<li class="{{ Request::is('pedidos*') ? 'active' : '' }}">
    <a href="{!! route('admin.pedidos.index') !!}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
</li>

<li class="{{ Request::is('clientes*') ? 'active' : '' }}">
    <a href="{!! route('admin.clientes.index') !!}"><i class="fa fa-edit"></i><span>Clientes</span></a>
</li>

{{--<li class="">--}}
    {{--<a href="{!! route('admin.reportes.index') !!}"><i class="fa fa-edit"></i><span>Reportes</span></a>--}}
{{--</li>--}}

<li class="{{ Request::is('vendedors*') ? 'active' : '' }}">
    <a href="{!! route('admin.vendedors.index') !!}"><i class="fa fa-edit"></i><span>Vendedores</span></a>
</li>

