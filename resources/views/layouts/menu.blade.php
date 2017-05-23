

<li class="{{ Request::is('tokens*') ? 'active' : '' }}">
    <a href="{!! route('admin.tokens.index') !!}"><i class="fa fa-edit"></i><span>Tokens</span></a>
</li>

<li class="{{ Request::is('formularios*') ? 'active' : '' }}">
    <a href="{!! route('admin.formularios.index') !!}"><i class="fa fa-edit"></i><span>Formularios</span></a>
</li>

<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
    <a href="{!! route('admin.users.index') !!}"><i class="fa fa-users"></i><span>Usuarios</span></a>
</li>
<li class="{{ Request::is('crms*') ? 'active' : '' }}">
    <a href="{!! route('admin.crms.index') !!}"><i class="fa fa-edit"></i><span>Crms</span></a>
</li>

<li class="{{ Request::is('servicioCrms*') ? 'active' : '' }}">
    <a href="{!! route('admin.servicioCrms.index') !!}"><i class="fa fa-edit"></i><span>ServicioCrms</span></a>
</li>

<li class="{{ Request::is('campoServicioCrms*') ? 'active' : '' }}">
    <a href="{!! route('admin.campoServicioCrms.index') !!}"><i class="fa fa-edit"></i><span>CampoServicioCrms</span></a>
</li>

<li class="{{ Request::is('servicioCrmXFormularios*') ? 'active' : '' }}">
    <a href="{!! route('admin.servicioCrmXFormularios.index') !!}"><i class="fa fa-edit"></i><span>ServicioCrmXFormularios</span></a>
</li>

<li class="{{ Request::is('asociacionCamposServicios*') ? 'active' : '' }}">
    <a href="{!! route('admin.asociacionCamposServicios.index') !!}"><i class="fa fa-edit"></i><span>AsociacionCamposServicios</span></a>
</li>

{{--<li class="{{ Request::is('formularioEnviadoXservicios*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.formularioEnviadoXservicios.index') !!}"><i class="fa fa-edit"></i><span>formularioEnviadoXservicios</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('formularioEnviadoXServicios*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.formularioEnviadoXServicios.index') !!}"><i class="fa fa-edit"></i><span>FormularioEnviadoXServicios</span></a>--}}
{{--</li>--}}

