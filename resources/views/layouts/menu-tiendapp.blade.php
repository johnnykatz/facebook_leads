<li class="{{ (Request::is('admin/marcas*') or Request::is('admin/categorias*') or Request::is('admin/productos*')or Request::is('admin/productoDistribuidors*')or  Request::is('admin/ofertas*')) ? 'active' : '' }} treeview">
    <a href="#">
        <i class="fa fa-bookmark"></i> <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/productos*') ? 'active' : '' }}">
            <a href="{!! route('admin.productos.index') !!}"><i class="fa fa-edit"></i><span>Productos</span></a>
        </li>
        <li class="{{ Request::is('admin/productoDistribuidors') ? 'active' : '' }}">
            <a href="{!! route('admin.productoDistribuidors.index') !!}"><i
                        class="fa fa-edit"></i><span>Productos Distribuidores</span></a>
        </li>
        <li class="{{ Request::is('admin/ofertas*') ? 'active' : '' }}">
            <a href="{!! route('admin.ofertas.index') !!}"><i class="fa fa-edit"></i><span>Ofertas</span></a>
        </li>

        <li class="{{ Request::is('admin/marcas*') ? 'active' : '' }}">
            <a href="{!! route('admin.marcas.index') !!}"><i class="fa fa-edit"></i><span>Marcas</span></a>
        </li>

        <li class="{{ Request::is('admin/categorias*') ? 'active' : '' }}">
            <a href="{!! route('admin.categorias.index') !!}"><i class="fa fa-edit"></i><span>Categorias</span></a>
        </li>
        <li class="{{ Request::is('admin/productoDistribuidors/update_info_productos*') ? 'active' : '' }}">
            <a href="{!! route('admin.productoDistribuidors.update_info_productos') !!}"><i
                        class="fa fa-edit"></i><span>Actualizar Inactivos</span></a>
        </li>
    </ul>
</li>

<li class="{{ (Request::is('admin/clientes*')or Request::is('admin/tiendas*')or  Request::is('admin/tiendaXDistribuidors*')) ? 'active' : '' }} treeview">
    <a href="#">
        <i class="fa  fa-male"></i> <span>Clientes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/clientes*') ? 'active' : '' }}">
            <a href="{!! route('admin.clientes.index') !!}"><i class="fa fa-edit"></i><span>Clientes</span></a>
        </li>

        <li class="{{ Request::is('admin/tiendas*') ? 'active' : '' }}">
            <a href="{!! route('admin.tiendas.index') !!}"><i class="fa fa-edit"></i><span>Tiendas</span></a>
        </li>
        <li class="{{ Request::is('admin/tiendaXDistribuidors') ? 'active' : '' }}">
            <a href="{!! route('admin.tiendaXDistribuidors.index') !!}"><i
                        class="fa fa-edit"></i><span>Tiendas distribuidores</span></a>
        </li>
        <li class="{{ Request::is('admin/tiendaXDistribuidors/update_datos_tienda*') ? 'active' : '' }}">
            <a href="{!! route('admin.tiendaXDistribuidors.update_datos_tienda') !!}"><i
                        class="fa fa-edit"></i><span>Actualizar Datos</span></a>
        </li>
        <li class="{{ Request::is('admin/tiendas/index/sin-asociar') ? 'active' : '' }}">
            <a href="{!! route('admin.tiendas.tiendas_para_asociar') !!}"><i class="fa fa-edit"></i><span>Tiendas para asociar</span></a>
        </li>
    </ul>
</li>

<li class="{{ (Request::is('admin/pedidos')or Request::is('admin/estadoPedidos*')) ? 'active' : '' }} treeview">
    <a href="#">
        <i class="fa fa-shopping-cart"></i> <span>Pedidos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/pedidos*') ? 'active' : '' }}">
            <a href="{!! route('admin.pedidos.index') !!}"><i class="fa fa-edit"></i><span>Pedidos</span></a>
        </li>
        <li class="{{ Request::is('admin/estadoPedidos*') ? 'active' : '' }}">
            <a href="{!! route('admin.estadoPedidos.index') !!}"><i class="fa fa-edit"></i><span>Estados Pedidos</span></a>
        </li>

    </ul>
</li>

<li class="{{ Request::is('admin/companias*') ? 'active' : '' }}">
    <a href="{!! route('admin.companias.index') !!}"><i class="fa fa-trademark"></i><span>Compañ&iacute;as</span></a>
</li>

<li class="{{ Request::is('admin/distribuidors*') ? 'active' : '' }}">
    <a href="{!! route('admin.distribuidors.index') !!}"><i class="fa fa-truck"></i><span>Distribuidores</span></a>
</li>
<li class="{{ Request::is('admin/vendedors*') ? 'active' : '' }}">
    <a href="{!! route('admin.vendedors.index') !!}"><i class="fa fa-edit"></i><span>Vendedores</span></a>
</li>


<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
    <a href="{!! route('admin.users.index') !!}"><i class="fa fa-users"></i><span>Usuarios</span></a>
</li>


<li class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
    <a href="{!! route('admin.posts.index') !!}"><i class="fa fa-commenting-o"></i><span>Posts</span></a>
</li>

<li class="{{ (Request::is('admin/reportes*')) ? 'active' : '' }}">
    <a href="{!! route('admin.reportes.index') !!}"><i class="fa fa-pie-chart"></i><span>Reportes</span></a>
</li>


<li class="{{ (Request::is('admin/movilwayProductos*')or Request::is('admin/movilwayTransaccions*')) ? 'active' : '' }} treeview">
    <a href="#">
        <i class="fa fa-dollar"></i> <span>Movilway</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/movilwayProductos*') ? 'active' : '' }}">
            <a href="{!! route('admin.movilwayProductos.index') !!}"><i
                        class="fa fa-edit"></i><span>Movilway Productos</span></a>
        </li>

        <li class="{{ Request::is('admin/movilwayTransaccions*') ? 'active' : '' }}">
            <a href="{!! route('admin.movilwayTransaccions.index') !!}"><i
                        class="fa fa-edit"></i><span>Movilway Transacciones</span></a>
        </li>

        <li class="{{ Request::is('admin/movilwayOperadors*') ? 'active' : '' }}">
            <a href="{!! route('admin.movilwayOperadors.index') !!}"><i class="fa fa-edit"></i><span>Movilway Operadores</span></a>
        </li>

    </ul>
</li>


<li class="{{ (Request::is('admin/departamentos*')or Request::is('admin/ciudads*')) ? 'active' : '' }} treeview">
    <a href="#">
        <i class="fa fa-location-arrow"></i> <span>Localizaci&oacute;n</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('admin/departamentos*') ? 'active' : '' }}">
            <a href="{!! route('admin.departamentos.index') !!}"><i
                        class="fa fa-edit"></i><span>Departamentos</span></a>
        </li>

        <li class="{{ Request::is('admin/ciudads*') ? 'active' : '' }}">
            <a href="{!! route('admin.ciudads.index') !!}"><i class="fa fa-edit"></i><span>Ciudades</span></a>
        </li>

    </ul>
</li>