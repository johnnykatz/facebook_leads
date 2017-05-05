<li class="{{ Request::is('companias*') ? 'active' : '' }}">
    <a href="{!! route('admin.companias.index') !!}"><i class="fa fa-edit"></i><span>Companias</span></a>
</li>

<li class="{{ Request::is('marcas*') ? 'active' : '' }}">
    <a href="{!! route('admin.marcas.index') !!}"><i class="fa fa-edit"></i><span>Marcas</span></a>
</li>
<li class="{{ Request::is('productos*') ? 'active' : '' }}">
    <a href="{!! route('admin.productos.index') !!}"><i class="fa fa-edit"></i><span>Productos</span></a>
</li>

<li class="{{ Request::is('ofertas*') ? 'active' : '' }}">
    <a href="{!! route('admin.ofertas.index') !!}"><i class="fa fa-edit"></i><span>Ofertas</span></a>
</li>

{{--<li class="{{ Request::is('tempEnvios*') ? 'active' : '' }}">--}}
{{--<a href="{!! route('admin.tempEnvios.index') !!}"><i class="fa fa-edit"></i><span>TempEnvios</span></a>--}}
{{--</li>--}}

<li class="{{ Request::is('estadoPedidos*') ? 'active' : '' }}">
    <a href="{!! route('admin.estadoPedidos.index') !!}"><i class="fa fa-edit"></i><span>Estados Pedidos</span></a>
</li>

{{--<li class="{{ Request::is('categoriaXProductos*') ? 'active' : '' }}">--}}
{{--<a href="{!! route('admin.categoriaXProductos.index') !!}"><i class="fa fa-edit"></i><span>CategoriaXProductos</span></a>--}}
{{--</li>--}}

<li class="{{ Request::is('categorias*') ? 'active' : '' }}">
    <a href="{!! route('admin.categorias.index') !!}"><i class="fa fa-edit"></i><span>Categorias</span></a>
</li>

<li class="{{ Request::is('pedidos*') ? 'active' : '' }}">
    <a href="{!! route('admin.pedidos.index') !!}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
</li>

{{--<li class="{{ Request::is('direccionUsuarios*') ? 'active' : '' }}">--}}
{{--<a href="{!! route('admin.direccionUsuarios.index') !!}"><i class="fa fa-edit"></i><span>DireccionUsuarios</span></a>--}}
{{--</li>--}}


<li class="{{ Request::is('departamentos*') ? 'active' : '' }}">
    <a href="{!! route('admin.departamentos.index') !!}"><i class="fa fa-edit"></i><span>Departamentos</span></a>
</li>

{{--<li class="{{ Request::is('pedidoXProductos*') ? 'active' : '' }}">--}}
{{--<a href="{!! route('admin.pedidoXProductos.index') !!}"><i class="fa fa-edit"></i><span>PedidoXProductos</span></a>--}}
{{--</li>--}}


<li class="{{ Request::is('ciudads*') ? 'active' : '' }}">
    <a href="{!! route('admin.ciudads.index') !!}"><i class="fa fa-edit"></i><span>Ciudades</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('admin.users.index') !!}"><i class="fa fa-edit"></i><span>Usuarios</span></a>
</li>
<li class="{{ Request::is('clientes*') ? 'active' : '' }}">
    <a href="{!! route('admin.clientes.index') !!}"><i class="fa fa-edit"></i><span>Clientes</span></a>
</li>

<li class="{{ Request::is('posts*') ? 'active' : '' }}">
    <a href="{!! route('admin.posts.index') !!}"><i class="fa fa-edit"></i><span>Posts</span></a>
</li>

<li class="">
    <a href="{!! route('admin.reportes.index') !!}"><i class="fa fa-edit"></i><span>Reportes</span></a>
</li>

{{--<li class="{{ Request::is('comentarios*') ? 'active' : '' }}">--}}
{{--<a href="{!! route('admin.comentarios.index') !!}"><i class="fa fa-edit"></i><span>Comentarios</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('meGustas*') ? 'active' : '' }}">--}}
{{--<a href="{!! route('admin.meGustas.index') !!}"><i class="fa fa-edit"></i><span>MeGustas</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('mediaPosts*') ? 'active' : '' }}">--}}
{{--<a href="{!! route('admin.mediaPosts.index') !!}"><i class="fa fa-edit"></i><span>MediaPosts</span></a>--}}
{{--</li>--}}


<li class="{{ Request::is('vendedors*') ? 'active' : '' }}">
    <a href="{!! route('admin.vendedors.index') !!}"><i class="fa fa-edit"></i><span>Vendedores</span></a>
</li>

<li class="{{ Request::is('clienteXCompanias*') ? 'active' : '' }}">
    <a href="{!! route('admin.clienteXCompanias.index') !!}"><i class="fa fa-edit"></i><span>ClienteXCompanias</span></a>
</li>

<li class="{{ Request::is('grupoVendedors*') ? 'active' : '' }}">
    <a href="{!! route('admin.grupoVendedors.index') !!}"><i class="fa fa-edit"></i><span>GrupoVendedors</span></a>
</li>

<li class="{{ Request::is('distribuidors*') ? 'active' : '' }}">
    <a href="{!! route('admin.distribuidors.index') !!}"><i class="fa fa-edit"></i><span>Distribuidors</span></a>
</li>

<li class="{{ Request::is('companiaXDistribuidors*') ? 'active' : '' }}">
    <a href="{!! route('admin.companiaXDistribuidors.index') !!}"><i class="fa fa-edit"></i><span>CompaniaXDistribuidors</span></a>
</li>

<li class="{{ Request::is('vendedorXCompaniaDistribuidors*') ? 'active' : '' }}">
    <a href="{!! route('admin.vendedorXCompaniaDistribuidors.index') !!}"><i class="fa fa-edit"></i><span>VendedorXCompaniaDistribuidors</span></a>
</li>

<li class="{{ Request::is('listaPrecios*') ? 'active' : '' }}">
    <a href="{!! route('admin.listaPrecios.index') !!}"><i class="fa fa-edit"></i><span>ListaPrecios</span></a>
</li>

<li class="{{ Request::is('productoDistribuidors*') ? 'active' : '' }}">
    <a href="{!! route('admin.productoDistribuidors.index') !!}"><i class="fa fa-edit"></i><span>ProductoDistribuidors</span></a>
</li>

<li class="{{ Request::is('precioProductos*') ? 'active' : '' }}">
    <a href="{!! route('admin.precioProductos.index') !!}"><i class="fa fa-edit"></i><span>PrecioProductos</span></a>
</li>

<li class="{{ Request::is('tiendas*') ? 'active' : '' }}">
    <a href="{!! route('admin.tiendas.index') !!}"><i class="fa fa-edit"></i><span>Tiendas</span></a>
</li>

<li class="{{ Request::is('logPedidos*') ? 'active' : '' }}">
    <a href="{!! route('admin.logPedidos.index') !!}"><i class="fa fa-edit"></i><span>LogPedidos</span></a>
</li>

<li class="{{ Request::is('erps*') ? 'active' : '' }}">
    <a href="{!! route('admin.erps.index') !!}"><i class="fa fa-edit"></i><span>Erps</span></a>
</li>

<li class="{{ Request::is('ciudadErps*') ? 'active' : '' }}">
    <a href="{!! route('admin.ciudadErps.index') !!}"><i class="fa fa-edit"></i><span>CiudadErps</span></a>
</li>

<li class="{{ Request::is('canalClientes*') ? 'active' : '' }}">
    <a href="{!! route('admin.canalClientes.index') !!}"><i class="fa fa-edit"></i><span>CanalClientes</span></a>
</li>

<li class="{{ Request::is('zonaDistribuidors*') ? 'active' : '' }}">
    <a href="{!! route('admin.zonaDistribuidors.index') !!}"><i class="fa fa-edit"></i><span>ZonaDistribuidors</span></a>
</li>

<li class="{{ Request::is('servicioExtexnos*') ? 'active' : '' }}">
    <a href="{!! route('servicioExtexnos.index') !!}"><i class="fa fa-edit"></i><span>ServicioExtexnos</span></a>
</li>

<li class="{{ Request::is('sEProductos*') ? 'active' : '' }}">
    <a href="{!! route('sEProductos.index') !!}"><i class="fa fa-edit"></i><span>SEProductos</span></a>
</li>

<li class="{{ Request::is('cuentaCorrientes*') ? 'active' : '' }}">
    <a href="{!! route('cuentaCorrientes.index') !!}"><i class="fa fa-edit"></i><span>CuentaCorrientes</span></a>
</li>

<li class="{{ Request::is('servicioExternos*') ? 'active' : '' }}">
    <a href="{!! route('admin.servicioExternos.index') !!}"><i class="fa fa-edit"></i><span>ServicioExternos</span></a>
</li>

<li class="{{ Request::is('sEProductos*') ? 'active' : '' }}">
    <a href="{!! route('admin.sEProductos.index') !!}"><i class="fa fa-edit"></i><span>SEProductos</span></a>
</li>

<li class="{{ Request::is('cuentaCorrientes*') ? 'active' : '' }}">
    <a href="{!! route('admin.cuentaCorrientes.index') !!}"><i class="fa fa-edit"></i><span>CuentaCorrientes</span></a>
</li>

<li class="{{ Request::is('tiendaXDistribuidors*') ? 'active' : '' }}">
    <a href="{!! route('adminn.tiendaXDistribuidors.index') !!}"><i class="fa fa-edit"></i><span>TiendaXDistribuidors</span></a>
</li>

<li class="{{ Request::is('movilwayLogTransaccions*') ? 'active' : '' }}">
    <a href="{!! route('admin.movilwayLogTransaccions.index') !!}"><i class="fa fa-edit"></i><span>MovilwayLogTransaccions</span></a>
</li>

<li class="{{ Request::is('logCuentaCorrientes*') ? 'active' : '' }}">
    <a href="{!! route('admin.logCuentaCorrientes.index') !!}"><i class="fa fa-edit"></i><span>LogCuentaCorrientes</span></a>
</li>

<li class="{{ Request::is('cuentaCorrienteMovimientos*') ? 'active' : '' }}">
    <a href="{!! route('admin.cuentaCorrienteMovimientos.index') !!}"><i class="fa fa-edit"></i><span>CuentaCorrienteMovimientos</span></a>
</li>

<li class="{{ Request::is('movilwayTransaccions*') ? 'active' : '' }}">
    <a href="{!! route('admin.movilwayTransaccions.index') !!}"><i class="fa fa-edit"></i><span>MovilwayTransaccions</span></a>
</li>

<li class="{{ Request::is('movilwayProductos*') ? 'active' : '' }}">
    <a href="{!! route('admin.movilwayProductos.index') !!}"><i class="fa fa-edit"></i><span>MovilwayProductos</span></a>
</li>

<li class="{{ Request::is('dias*') ? 'active' : '' }}">
    <a href="{!! route('admin.dias.index') !!}"><i class="fa fa-edit"></i><span>Dias</span></a>
</li>

<li class="{{ Request::is('movilwayOperadors*') ? 'active' : '' }}">
    <a href="{!! route('admin.movilwayOperadors.index') !!}"><i class="fa fa-edit"></i><span>MovilwayOperadors</span></a>
</li>

<li class="{{ Request::is('movilwayTipoProductos*') ? 'active' : '' }}">
    <a href="{!! route('admin.movilwayTipoProductos.index') !!}"><i class="fa fa-edit"></i><span>MovilwayTipoProductos</span></a>
</li>

