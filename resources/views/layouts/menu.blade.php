

<li class="{{ Request::is('tokens*') ? 'active' : '' }}">
    <a href="{!! route('admin.tokens.index') !!}"><i class="fa fa-edit"></i><span>Tokens</span></a>
</li>

<li class="{{ Request::is('formularios*') ? 'active' : '' }}">
    <a href="{!! route('admin.formularios.index') !!}"><i class="fa fa-edit"></i><span>Formularios</span></a>
</li>

<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
    <a href="{!! route('admin.users.index') !!}"><i class="fa fa-users"></i><span>Usuarios</span></a>
</li>