<li class="{{ Request::is('tokens*') ? 'active' : '' }}">
    <a href="{!! route('admin.tokens.index') !!}"><i class="fa fa-edit"></i><span>Tokens</span></a>
</li>

<li class="{{ Request::is('formularios*') ? 'active' : '' }}">
    <a href="{!! route('admin.formularios.index') !!}"><i class="fa fa-edit"></i><span>Formularios</span></a>
</li>

<li class="{{ Request::is('landings*') ? 'active' : '' }}">
    <a href="{!! route('admin.landings.index') !!}"><i class="fa fa-edit"></i><span>Landings</span></a>
</li>

{{--<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.users.index') !!}"><i class="fa fa-users"></i><span>Usuarios</span></a>--}}
{{--</li>--}}
<li class="{{ Request::is('crms*') ? 'active' : '' }}">
    <a href="{!! route('admin.crms.index') !!}"><i class="fa fa-edit"></i><span>Crms</span></a>
</li>

<li class="{{ Request::is('servicioCrms*') ? 'active' : '' }}">
    <a href="{!! route('admin.servicioCrms.index') !!}"><i class="fa fa-edit"></i><span>ServicioCrms</span></a>
</li>

<li class="{{ Request::is('campoServicioCrms*') ? 'active' : '' }}">
    <a href="{!! route('admin.campoServicioCrms.index') !!}"><i
                class="fa fa-edit"></i><span>CampoServicioCrms</span></a>
</li>

{{--<li class="{{ Request::is('servicioCrmXFormularios*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.servicioCrmXFormularios.index') !!}"><i class="fa fa-edit"></i><span>ServicioCrmXFormularios</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('asociacionCamposServicios*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.asociacionCamposServicios.index') !!}"><i class="fa fa-edit"></i><span>AsociacionCamposServicios</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('formularioEnviadoXservicios*') ? 'active' : '' }}">--}}
{{--<a href="{!! route('admin.formularioEnviadoXservicios.index') !!}"><i class="fa fa-edit"></i><span>formularioEnviadoXservicios</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('formularioEnviadoXServicios*') ? 'active' : '' }}">--}}
{{--<a href="{!! route('admin.formularioEnviadoXServicios.index') !!}"><i class="fa fa-edit"></i><span>FormularioEnviadoXServicios</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('estadoEnvios*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.estadoEnvios.index') !!}"><i class="fa fa-edit"></i><span>EstadoEnvios</span></a>--}}
{{--</li>--}}


{{--<li class="{{ Request::is('serviciosCrmsXLandings*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.serviciosCrmsXLandings.index') !!}"><i--}}
                {{--class="fa fa-edit"></i><span>ServiciosCrmsXLandings</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('serviciosCrmsXLandings*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.serviciosCrmsXLandings.index') !!}"><i--}}
                {{--class="fa fa-edit"></i><span>ServiciosCrmsXLandings</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('landingsCamposServicios*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.landingsCamposServicios.index') !!}"><i class="fa fa-edit"></i><span>LandingsCamposServicios</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('landingsEnviadosXServicios*') ? 'active' : '' }}">--}}
    {{--<a href="{!! route('admin.landingsEnviadosXServicios.index') !!}"><i class="fa fa-edit"></i><span>LandingsEnviadosXServicios</span></a>--}}
{{--</li>--}}

