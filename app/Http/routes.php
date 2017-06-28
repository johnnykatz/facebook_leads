<?php
header('Access-Control-Allow-Origin: *');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect('/home');
    return redirect('/home');
});

Route::get('/admin', function () {
    return redirect('/home');
});

//Entrust::routeNeedsRole('admin/', 'admin', Redirect::to('/home'));
/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/
//solicitud de token
Route::post('auth_login', 'API\APIAuthController@userAuth');

Route::group(['middleware' => 'jwt.auth'], function () {
//rutas protegidas por token


});

Route::post('getLoginCliente', 'API\APIAuthController@getLoginCliente');


Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});

//Route::get('/admin/', ['middleware' => 'auth', function () {
//
//}]);


Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/home', 'HomeController@index');





Route::get('prueba', 'API\pruebas@prueba');
Route::get('fb_login', 'API\pruebas@fb_login');
Route::get('perfil', 'API\pruebas@perfil');
Route::get('formularios', 'API\pruebas@formularios');
Route::get('crear_estructura', 'API\pruebas@crearEstructura');
Route::get('sincronizar', 'API\pruebas@sincronizar');
Route::get('enviarDatos/{servicio}', 'API\pruebas@enviarDatos');


Route::get('callback', 'Admin\FacebookController@callback');





Route::get('admin/tokens', ['as'=> 'admin.tokens.index', 'uses' => 'Admin\TokenController@index', 'middleware' => ['auth']]);
Route::post('admin/tokens', ['as'=> 'admin.tokens.store', 'uses' => 'Admin\TokenController@store', 'middleware' => ['auth']]);
Route::get('admin/tokens/create', ['as'=> 'admin.tokens.create', 'uses' => 'Admin\TokenController@create', 'middleware' => ['auth']]);
Route::put('admin/tokens/{tokens}', ['as'=> 'admin.tokens.update', 'uses' => 'Admin\TokenController@update', 'middleware' => ['auth']]);
Route::patch('admin/tokens/{tokens}', ['as'=> 'admin.tokens.update', 'uses' => 'Admin\TokenController@update', 'middleware' => ['auth']]);
Route::delete('admin/tokens/{tokens}', ['as'=> 'admin.tokens.destroy', 'uses' => 'Admin\TokenController@destroy', 'middleware' => ['auth']]);
Route::get('admin/tokens/{tokens}', ['as'=> 'admin.tokens.show', 'uses' => 'Admin\TokenController@show', 'middleware' => ['auth']]);
Route::get('admin/tokens/{tokens}/edit', ['as'=> 'admin.tokens.edit', 'uses' => 'Admin\TokenController@edit', 'middleware' => ['auth']]);


Route::get('admin/formularios', ['as'=> 'admin.formularios.index', 'uses' => 'Admin\FormularioController@index', 'middleware' => ['auth']]);
Route::post('admin/formularios', ['as'=> 'admin.formularios.store', 'uses' => 'Admin\FormularioController@store', 'middleware' => ['auth']]);
Route::get('admin/formularios/create', ['as'=> 'admin.formularios.create', 'uses' => 'Admin\FormularioController@create', 'middleware' => ['auth']]);
Route::put('admin/formularios/{formularios}', ['as'=> 'admin.formularios.update', 'uses' => 'Admin\FormularioController@update', 'middleware' => ['auth']]);
Route::patch('admin/formularios/{formularios}', ['as'=> 'admin.formularios.update', 'uses' => 'Admin\FormularioController@update', 'middleware' => ['auth']]);
Route::delete('admin/formularios/{formularios}', ['as'=> 'admin.formularios.destroy', 'uses' => 'Admin\FormularioController@destroy', 'middleware' => ['auth']]);
Route::get('admin/formularios/{formularios}', ['as'=> 'admin.formularios.show', 'uses' => 'Admin\FormularioController@show', 'middleware' => ['auth']]);
Route::get('admin/formularios/{formularios}/edit', ['as'=> 'admin.formularios.edit', 'uses' => 'Admin\FormularioController@edit', 'middleware' => ['auth']]);
Route::get('admin/formularios/{formularios}/crear_estructura', ['as'=> 'admin.formularios.crear_estructura', 'uses' => 'Admin\FormularioController@crearEstructura', 'middleware' => ['auth']]);


Route::get('admin/formularios/{formularios}/listar_datos', ['as'=> 'admin.formularios.listar_datos', 'uses' => 'Admin\FormularioController@listarDatos', 'middleware' => ['auth']]);




Route::get('admin/users/editPassword', ['as' => 'admin.users.editPassword', 'uses' => 'Admin\UserController@editPassword', 'middleware' => ['auth']]);
Route::post('admin/users/updatePassword', ['as' => 'admin.users.updatePassword', 'uses' => 'Admin\UserController@updatePassword', 'middleware' => ['auth']]);

Route::get('admin/users', ['as' => 'admin.users.index', 'uses' => 'Admin\UserController@index', 'middleware' => ['auth']]);
Route::post('admin/users', ['as' => 'admin.users.store', 'uses' => 'Admin\UserController@store', 'middleware' => ['auth']]);
Route::get('admin/users/create', ['as' => 'admin.users.create', 'uses' => 'Admin\UserController@create', 'middleware' => ['auth']]);
Route::put('admin/users/{users}', ['as' => 'admin.users.update', 'uses' => 'Admin\UserController@update', 'middleware' => ['auth']]);
Route::patch('admin/users/{users}', ['as' => 'admin.users.update', 'uses' => 'Admin\UserController@update', 'middleware' => ['auth']]);
Route::delete('admin/users/{users}', ['as' => 'admin.users.destroy', 'uses' => 'Admin\UserController@destroy', 'middleware' => ['auth']]);
Route::get('admin/users/{users}', ['as' => 'admin.users.show', 'uses' => 'Admin\UserController@show', 'middleware' => ['auth']]);
Route::get('admin/users/{users}/edit', ['as' => 'admin.users.edit', 'uses' => 'Admin\UserController@edit', 'middleware' => ['auth']]);



Route::get('admin/crms', ['as'=> 'admin.crms.index', 'uses' => 'Admin\CrmController@index']);
Route::post('admin/crms', ['as'=> 'admin.crms.store', 'uses' => 'Admin\CrmController@store']);
Route::get('admin/crms/create', ['as'=> 'admin.crms.create', 'uses' => 'Admin\CrmController@create']);
Route::put('admin/crms/{crms}', ['as'=> 'admin.crms.update', 'uses' => 'Admin\CrmController@update']);
Route::patch('admin/crms/{crms}', ['as'=> 'admin.crms.update', 'uses' => 'Admin\CrmController@update']);
Route::delete('admin/crms/{crms}', ['as'=> 'admin.crms.destroy', 'uses' => 'Admin\CrmController@destroy']);
Route::get('admin/crms/{crms}', ['as'=> 'admin.crms.show', 'uses' => 'Admin\CrmController@show']);
Route::get('admin/crms/{crms}/edit', ['as'=> 'admin.crms.edit', 'uses' => 'Admin\CrmController@edit']);


Route::get('admin/servicioCrms', ['as'=> 'admin.servicioCrms.index', 'uses' => 'Admin\ServicioCrmController@index']);
Route::post('admin/servicioCrms', ['as'=> 'admin.servicioCrms.store', 'uses' => 'Admin\ServicioCrmController@store']);
Route::get('admin/servicioCrms/create', ['as'=> 'admin.servicioCrms.create', 'uses' => 'Admin\ServicioCrmController@create']);
Route::put('admin/servicioCrms/{servicioCrms}', ['as'=> 'admin.servicioCrms.update', 'uses' => 'Admin\ServicioCrmController@update']);
Route::patch('admin/servicioCrms/{servicioCrms}', ['as'=> 'admin.servicioCrms.update', 'uses' => 'Admin\ServicioCrmController@update']);
Route::delete('admin/servicioCrms/{servicioCrms}', ['as'=> 'admin.servicioCrms.destroy', 'uses' => 'Admin\ServicioCrmController@destroy']);
Route::get('admin/servicioCrms/{servicioCrms}', ['as'=> 'admin.servicioCrms.show', 'uses' => 'Admin\ServicioCrmController@show']);
Route::get('admin/servicioCrms/{servicioCrms}/edit', ['as'=> 'admin.servicioCrms.edit', 'uses' => 'Admin\ServicioCrmController@edit']);


Route::get('admin/campoServicioCrms', ['as'=> 'admin.campoServicioCrms.index', 'uses' => 'Admin\CampoServicioCrmController@index']);
Route::post('admin/campoServicioCrms', ['as'=> 'admin.campoServicioCrms.store', 'uses' => 'Admin\CampoServicioCrmController@store']);
Route::get('admin/campoServicioCrms/create', ['as'=> 'admin.campoServicioCrms.create', 'uses' => 'Admin\CampoServicioCrmController@create']);
Route::put('admin/campoServicioCrms/{campoServicioCrms}', ['as'=> 'admin.campoServicioCrms.update', 'uses' => 'Admin\CampoServicioCrmController@update']);
Route::patch('admin/campoServicioCrms/{campoServicioCrms}', ['as'=> 'admin.campoServicioCrms.update', 'uses' => 'Admin\CampoServicioCrmController@update']);
Route::delete('admin/campoServicioCrms/{campoServicioCrms}', ['as'=> 'admin.campoServicioCrms.destroy', 'uses' => 'Admin\CampoServicioCrmController@destroy']);
Route::get('admin/campoServicioCrms/{campoServicioCrms}', ['as'=> 'admin.campoServicioCrms.show', 'uses' => 'Admin\CampoServicioCrmController@show']);
Route::get('admin/campoServicioCrms/{campoServicioCrms}/edit', ['as'=> 'admin.campoServicioCrms.edit', 'uses' => 'Admin\CampoServicioCrmController@edit']);


Route::get('admin/servicioCrmXFormularios', ['as'=> 'admin.servicioCrmXFormularios.index', 'uses' => 'Admin\ServicioCrmXFormularioController@index']);
Route::post('admin/servicioCrmXFormularios', ['as'=> 'admin.servicioCrmXFormularios.store', 'uses' => 'Admin\ServicioCrmXFormularioController@store']);
Route::get('admin/servicioCrmXFormularios/create/{formulario_id}', ['as'=> 'admin.servicioCrmXFormularios.create', 'uses' => 'Admin\ServicioCrmXFormularioController@create']);
Route::put('admin/servicioCrmXFormularios/{servicioCrmXFormularios}', ['as'=> 'admin.servicioCrmXFormularios.update', 'uses' => 'Admin\ServicioCrmXFormularioController@update']);
Route::patch('admin/servicioCrmXFormularios/{servicioCrmXFormularios}', ['as'=> 'admin.servicioCrmXFormularios.update', 'uses' => 'Admin\ServicioCrmXFormularioController@update']);
Route::delete('admin/servicioCrmXFormularios/{servicioCrmXFormularios}', ['as'=> 'admin.servicioCrmXFormularios.destroy', 'uses' => 'Admin\ServicioCrmXFormularioController@destroy']);
Route::get('admin/servicioCrmXFormularios/{servicioCrmXFormularios}', ['as'=> 'admin.servicioCrmXFormularios.show', 'uses' => 'Admin\ServicioCrmXFormularioController@show']);
Route::get('admin/servicioCrmXFormularios/{servicioCrmXFormularios}/edit', ['as'=> 'admin.servicioCrmXFormularios.edit', 'uses' => 'Admin\ServicioCrmXFormularioController@edit']);


Route::get('admin/asociacionCamposServicios', ['as'=> 'admin.asociacionCamposServicios.index', 'uses' => 'Admin\AsociacionCamposServiciosController@index']);
Route::post('admin/asociacionCamposServicios', ['as'=> 'admin.asociacionCamposServicios.store', 'uses' => 'Admin\AsociacionCamposServiciosController@store']);
Route::get('admin/asociacionCamposServicios/create', ['as'=> 'admin.asociacionCamposServicios.create', 'uses' => 'Admin\AsociacionCamposServiciosController@create']);
Route::put('admin/asociacionCamposServicios/{asociacionCamposServicios}', ['as'=> 'admin.asociacionCamposServicios.update', 'uses' => 'Admin\AsociacionCamposServiciosController@update']);
Route::patch('admin/asociacionCamposServicios/{asociacionCamposServicios}', ['as'=> 'admin.asociacionCamposServicios.update', 'uses' => 'Admin\AsociacionCamposServiciosController@update']);
Route::delete('admin/asociacionCamposServicios/{asociacionCamposServicios}', ['as'=> 'admin.asociacionCamposServicios.destroy', 'uses' => 'Admin\AsociacionCamposServiciosController@destroy']);
Route::get('admin/asociacionCamposServicios/{asociacionCamposServicios}', ['as'=> 'admin.asociacionCamposServicios.show', 'uses' => 'Admin\AsociacionCamposServiciosController@show']);
Route::get('admin/asociacionCamposServicios/{asociacionCamposServicios}/edit', ['as'=> 'admin.asociacionCamposServicios.edit', 'uses' => 'Admin\AsociacionCamposServiciosController@edit']);

//
//
//Route::get('admin/formularioEnviadoXServicios', ['as'=> 'admin.formularioEnviadoXServicios.index', 'uses' => 'Admin\FormularioEnviadoXServicioController@index']);
//Route::post('admin/formularioEnviadoXServicios', ['as'=> 'admin.formularioEnviadoXServicios.store', 'uses' => 'Admin\FormularioEnviadoXServicioController@store']);
//Route::get('admin/formularioEnviadoXServicios/create', ['as'=> 'admin.formularioEnviadoXServicios.create', 'uses' => 'Admin\FormularioEnviadoXServicioController@create']);
//Route::put('admin/formularioEnviadoXServicios/{formularioEnviadoXServicios}', ['as'=> 'admin.formularioEnviadoXServicios.update', 'uses' => 'Admin\FormularioEnviadoXServicioController@update']);
//Route::patch('admin/formularioEnviadoXServicios/{formularioEnviadoXServicios}', ['as'=> 'admin.formularioEnviadoXServicios.update', 'uses' => 'Admin\FormularioEnviadoXServicioController@update']);
//Route::delete('admin/formularioEnviadoXServicios/{formularioEnviadoXServicios}', ['as'=> 'admin.formularioEnviadoXServicios.destroy', 'uses' => 'Admin\FormularioEnviadoXServicioController@destroy']);
//Route::get('admin/formularioEnviadoXServicios/{formularioEnviadoXServicios}', ['as'=> 'admin.formularioEnviadoXServicios.show', 'uses' => 'Admin\FormularioEnviadoXServicioController@show']);
//Route::get('admin/formularioEnviadoXServicios/{formularioEnviadoXServicios}/edit', ['as'=> 'admin.formularioEnviadoXServicios.edit', 'uses' => 'Admin\FormularioEnviadoXServicioController@edit']);


Route::get('admin/estadoEnvios', ['as'=> 'admin.estadoEnvios.index', 'uses' => 'Admin\EstadoEnvioController@index']);
Route::post('admin/estadoEnvios', ['as'=> 'admin.estadoEnvios.store', 'uses' => 'Admin\EstadoEnvioController@store']);
Route::get('admin/estadoEnvios/create', ['as'=> 'admin.estadoEnvios.create', 'uses' => 'Admin\EstadoEnvioController@create']);
Route::put('admin/estadoEnvios/{estadoEnvios}', ['as'=> 'admin.estadoEnvios.update', 'uses' => 'Admin\EstadoEnvioController@update']);
Route::patch('admin/estadoEnvios/{estadoEnvios}', ['as'=> 'admin.estadoEnvios.update', 'uses' => 'Admin\EstadoEnvioController@update']);
Route::delete('admin/estadoEnvios/{estadoEnvios}', ['as'=> 'admin.estadoEnvios.destroy', 'uses' => 'Admin\EstadoEnvioController@destroy']);
Route::get('admin/estadoEnvios/{estadoEnvios}', ['as'=> 'admin.estadoEnvios.show', 'uses' => 'Admin\EstadoEnvioController@show']);
Route::get('admin/estadoEnvios/{estadoEnvios}/edit', ['as'=> 'admin.estadoEnvios.edit', 'uses' => 'Admin\EstadoEnvioController@edit']);
