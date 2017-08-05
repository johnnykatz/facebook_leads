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





Route::get('admin/tokens', ['as'=> 'admin.tokens.index', 'uses' => 'Admin\TokenController@index']);
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



Route::get('admin/crms', ['as'=> 'admin.crms.index', 'uses' => 'Admin\CrmController@index', 'middleware' => ['auth']]);
Route::post('admin/crms', ['as'=> 'admin.crms.store', 'uses' => 'Admin\CrmController@store', 'middleware' => ['auth']]);
Route::get('admin/crms/create', ['as'=> 'admin.crms.create', 'uses' => 'Admin\CrmController@create', 'middleware' => ['auth']]);
Route::put('admin/crms/{crms}', ['as'=> 'admin.crms.update', 'uses' => 'Admin\CrmController@update', 'middleware' => ['auth']]);
Route::patch('admin/crms/{crms}', ['as'=> 'admin.crms.update', 'uses' => 'Admin\CrmController@update', 'middleware' => ['auth']]);
Route::delete('admin/crms/{crms}', ['as'=> 'admin.crms.destroy', 'uses' => 'Admin\CrmController@destroy', 'middleware' => ['auth']]);
Route::get('admin/crms/{crms}', ['as'=> 'admin.crms.show', 'uses' => 'Admin\CrmController@show', 'middleware' => ['auth']]);
Route::get('admin/crms/{crms}/edit', ['as'=> 'admin.crms.edit', 'uses' => 'Admin\CrmController@edit', 'middleware' => ['auth']]);


Route::get('admin/servicioCrms', ['as'=> 'admin.servicioCrms.index', 'uses' => 'Admin\ServicioCrmController@index', 'middleware' => ['auth']]);
Route::post('admin/servicioCrms', ['as'=> 'admin.servicioCrms.store', 'uses' => 'Admin\ServicioCrmController@store', 'middleware' => ['auth']]);
Route::get('admin/servicioCrms/create', ['as'=> 'admin.servicioCrms.create', 'uses' => 'Admin\ServicioCrmController@create', 'middleware' => ['auth']]);
Route::put('admin/servicioCrms/{servicioCrms}', ['as'=> 'admin.servicioCrms.update', 'uses' => 'Admin\ServicioCrmController@update', 'middleware' => ['auth']]);
Route::patch('admin/servicioCrms/{servicioCrms}', ['as'=> 'admin.servicioCrms.update', 'uses' => 'Admin\ServicioCrmController@update', 'middleware' => ['auth']]);
Route::delete('admin/servicioCrms/{servicioCrms}', ['as'=> 'admin.servicioCrms.destroy', 'uses' => 'Admin\ServicioCrmController@destroy', 'middleware' => ['auth']]);
Route::get('admin/servicioCrms/{servicioCrms}', ['as'=> 'admin.servicioCrms.show', 'uses' => 'Admin\ServicioCrmController@show', 'middleware' => ['auth']]);
Route::get('admin/servicioCrms/{servicioCrms}/edit', ['as'=> 'admin.servicioCrms.edit', 'uses' => 'Admin\ServicioCrmController@edit', 'middleware' => ['auth']]);


Route::get('admin/campoServicioCrms', ['as'=> 'admin.campoServicioCrms.index', 'uses' => 'Admin\CampoServicioCrmController@index', 'middleware' => ['auth']]);
Route::post('admin/campoServicioCrms', ['as'=> 'admin.campoServicioCrms.store', 'uses' => 'Admin\CampoServicioCrmController@store', 'middleware' => ['auth']]);
Route::get('admin/campoServicioCrms/create', ['as'=> 'admin.campoServicioCrms.create', 'uses' => 'Admin\CampoServicioCrmController@create', 'middleware' => ['auth']]);
Route::put('admin/campoServicioCrms/{campoServicioCrms}', ['as'=> 'admin.campoServicioCrms.update', 'uses' => 'Admin\CampoServicioCrmController@update', 'middleware' => ['auth']]);
Route::patch('admin/campoServicioCrms/{campoServicioCrms}', ['as'=> 'admin.campoServicioCrms.update', 'uses' => 'Admin\CampoServicioCrmController@update', 'middleware' => ['auth']]);
Route::delete('admin/campoServicioCrms/{campoServicioCrms}', ['as'=> 'admin.campoServicioCrms.destroy', 'uses' => 'Admin\CampoServicioCrmController@destroy', 'middleware' => ['auth']]);
Route::get('admin/campoServicioCrms/{campoServicioCrms}', ['as'=> 'admin.campoServicioCrms.show', 'uses' => 'Admin\CampoServicioCrmController@show', 'middleware' => ['auth']]);
Route::get('admin/campoServicioCrms/{campoServicioCrms}/edit', ['as'=> 'admin.campoServicioCrms.edit', 'uses' => 'Admin\CampoServicioCrmController@edit', 'middleware' => ['auth']]);


Route::get('admin/servicioCrmXFormularios', ['as'=> 'admin.servicioCrmXFormularios.index', 'uses' => 'Admin\ServicioCrmXFormularioController@index', 'middleware' => ['auth']]);
Route::post('admin/servicioCrmXFormularios', ['as'=> 'admin.servicioCrmXFormularios.store', 'uses' => 'Admin\ServicioCrmXFormularioController@store', 'middleware' => ['auth']]);
Route::get('admin/servicioCrmXFormularios/create/{formulario_id}', ['as'=> 'admin.servicioCrmXFormularios.create', 'uses' => 'Admin\ServicioCrmXFormularioController@create', 'middleware' => ['auth']]);
Route::put('admin/servicioCrmXFormularios/{servicioCrmXFormularios}', ['as'=> 'admin.servicioCrmXFormularios.update', 'uses' => 'Admin\ServicioCrmXFormularioController@update', 'middleware' => ['auth']]);
Route::patch('admin/servicioCrmXFormularios/{servicioCrmXFormularios}', ['as'=> 'admin.servicioCrmXFormularios.update', 'uses' => 'Admin\ServicioCrmXFormularioController@update', 'middleware' => ['auth']]);
Route::delete('admin/servicioCrmXFormularios/{servicioCrmXFormularios}', ['as'=> 'admin.servicioCrmXFormularios.destroy', 'uses' => 'Admin\ServicioCrmXFormularioController@destroy', 'middleware' => ['auth']]);
Route::get('admin/servicioCrmXFormularios/{servicioCrmXFormularios}', ['as'=> 'admin.servicioCrmXFormularios.show', 'uses' => 'Admin\ServicioCrmXFormularioController@show', 'middleware' => ['auth']]);
Route::get('admin/servicioCrmXFormularios/{servicioCrmXFormularios}/edit', ['as'=> 'admin.servicioCrmXFormularios.edit', 'uses' => 'Admin\ServicioCrmXFormularioController@edit', 'middleware' => ['auth']]);


Route::get('admin/asociacionCamposServicios', ['as'=> 'admin.asociacionCamposServicios.index', 'uses' => 'Admin\AsociacionCamposServiciosController@index', 'middleware' => ['auth']]);
Route::post('admin/asociacionCamposServicios', ['as'=> 'admin.asociacionCamposServicios.store', 'uses' => 'Admin\AsociacionCamposServiciosController@store', 'middleware' => ['auth']]);
Route::get('admin/asociacionCamposServicios/create', ['as'=> 'admin.asociacionCamposServicios.create', 'uses' => 'Admin\AsociacionCamposServiciosController@create', 'middleware' => ['auth']]);
Route::put('admin/asociacionCamposServicios/{asociacionCamposServicios}', ['as'=> 'admin.asociacionCamposServicios.update', 'uses' => 'Admin\AsociacionCamposServiciosController@update', 'middleware' => ['auth']]);
Route::patch('admin/asociacionCamposServicios/{asociacionCamposServicios}', ['as'=> 'admin.asociacionCamposServicios.update', 'uses' => 'Admin\AsociacionCamposServiciosController@update', 'middleware' => ['auth']]);
Route::delete('admin/asociacionCamposServicios/{asociacionCamposServicios}', ['as'=> 'admin.asociacionCamposServicios.destroy', 'uses' => 'Admin\AsociacionCamposServiciosController@destroy', 'middleware' => ['auth']]);
Route::get('admin/asociacionCamposServicios/{asociacionCamposServicios}', ['as'=> 'admin.asociacionCamposServicios.show', 'uses' => 'Admin\AsociacionCamposServiciosController@show', 'middleware' => ['auth']]);
Route::get('admin/asociacionCamposServicios/{asociacionCamposServicios}/edit', ['as'=> 'admin.asociacionCamposServicios.edit', 'uses' => 'Admin\AsociacionCamposServiciosController@edit', 'middleware' => ['auth']]);

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


Route::get('admin/estadoEnvios', ['as'=> 'admin.estadoEnvios.index', 'uses' => 'Admin\EstadoEnvioController@index', 'middleware' => ['auth']]);
Route::post('admin/estadoEnvios', ['as'=> 'admin.estadoEnvios.store', 'uses' => 'Admin\EstadoEnvioController@store', 'middleware' => ['auth']]);
Route::get('admin/estadoEnvios/create', ['as'=> 'admin.estadoEnvios.create', 'uses' => 'Admin\EstadoEnvioController@create', 'middleware' => ['auth']]);
Route::put('admin/estadoEnvios/{estadoEnvios}', ['as'=> 'admin.estadoEnvios.update', 'uses' => 'Admin\EstadoEnvioController@update', 'middleware' => ['auth']]);
Route::patch('admin/estadoEnvios/{estadoEnvios}', ['as'=> 'admin.estadoEnvios.update', 'uses' => 'Admin\EstadoEnvioController@update', 'middleware' => ['auth']]);
Route::delete('admin/estadoEnvios/{estadoEnvios}', ['as'=> 'admin.estadoEnvios.destroy', 'uses' => 'Admin\EstadoEnvioController@destroy', 'middleware' => ['auth']]);
Route::get('admin/estadoEnvios/{estadoEnvios}', ['as'=> 'admin.estadoEnvios.show', 'uses' => 'Admin\EstadoEnvioController@show', 'middleware' => ['auth']]);
Route::get('admin/estadoEnvios/{estadoEnvios}/edit', ['as'=> 'admin.estadoEnvios.edit', 'uses' => 'Admin\EstadoEnvioController@edit', 'middleware' => ['auth']]);


Route::get('admin/landings', ['as'=> 'admin.landings.index', 'uses' => 'Admin\LandingController@index', 'middleware' => ['auth']]);
Route::post('admin/landings', ['as'=> 'admin.landings.store', 'uses' => 'Admin\LandingController@store', 'middleware' => ['auth']]);
Route::get('admin/landings/create', ['as'=> 'admin.landings.create', 'uses' => 'Admin\LandingController@create', 'middleware' => ['auth']]);
Route::put('admin/landings/{landings}', ['as'=> 'admin.landings.update', 'uses' => 'Admin\LandingController@update', 'middleware' => ['auth']]);
Route::patch('admin/landings/{landings}', ['as'=> 'admin.landings.update', 'uses' => 'Admin\LandingController@update', 'middleware' => ['auth']]);
Route::delete('admin/landings/{landings}', ['as'=> 'admin.landings.destroy', 'uses' => 'Admin\LandingController@destroy', 'middleware' => ['auth']]);
Route::get('admin/landings/{landings}', ['as'=> 'admin.landings.show', 'uses' => 'Admin\LandingController@show', 'middleware' => ['auth']]);
Route::get('admin/landings/{landings}/edit', ['as'=> 'admin.landings.edit', 'uses' => 'Admin\LandingController@edit', 'middleware' => ['auth']]);

Route::get('admin/landings/{landings}/listar_datos', ['as'=> 'admin.landings.listar_datos', 'uses' => 'Admin\LandingController@listarDatos', 'middleware' => ['auth']]);


Route::get('admin/serviciosCrmsXLandings', ['as'=> 'admin.serviciosCrmsXLandings.index', 'uses' => 'Admin\ServiciosCrmsXLandingController@index', 'middleware' => ['auth']]);
Route::post('admin/serviciosCrmsXLandings', ['as'=> 'admin.serviciosCrmsXLandings.store', 'uses' => 'Admin\ServiciosCrmsXLandingController@store', 'middleware' => ['auth']]);
Route::get('admin/serviciosCrmsXLandings/create', ['as'=> 'admin.serviciosCrmsXLandings.create', 'uses' => 'Admin\ServiciosCrmsXLandingController@create', 'middleware' => ['auth']]);
Route::put('admin/serviciosCrmsXLandings/{serviciosCrmsXLandings}', ['as'=> 'admin.serviciosCrmsXLandings.update', 'uses' => 'Admin\ServiciosCrmsXLandingController@update', 'middleware' => ['auth']]);
Route::patch('admin/serviciosCrmsXLandings/{serviciosCrmsXLandings}', ['as'=> 'admin.serviciosCrmsXLandings.update', 'uses' => 'Admin\ServiciosCrmsXLandingController@update', 'middleware' => ['auth']]);
Route::delete('admin/serviciosCrmsXLandings/{serviciosCrmsXLandings}', ['as'=> 'admin.serviciosCrmsXLandings.destroy', 'uses' => 'Admin\ServiciosCrmsXLandingController@destroy', 'middleware' => ['auth']]);
Route::get('admin/serviciosCrmsXLandings/{serviciosCrmsXLandings}', ['as'=> 'admin.serviciosCrmsXLandings.show', 'uses' => 'Admin\ServiciosCrmsXLandingController@show', 'middleware' => ['auth']]);
Route::get('admin/serviciosCrmsXLandings/{serviciosCrmsXLandings}/edit', ['as'=> 'admin.serviciosCrmsXLandings.edit', 'uses' => 'Admin\ServiciosCrmsXLandingController@edit', 'middleware' => ['auth']]);
Route::get('admin/serviciosCrmsXLandings/recargar_campos/{landing_id}/{servicio_crm_id}', ['as'=> 'admin.serviciosCrmsXLandings.recargarCampos', 'uses' => 'Admin\ServiciosCrmsXLandingController@recargarCampos', 'middleware' => ['auth']]);


Route::get('admin/serviciosCrmsXLandings', ['as'=> 'admin.serviciosCrmsXLandings.index', 'uses' => 'Admin\ServiciosCrmsXLandingController@index', 'middleware' => ['auth']]);
Route::post('admin/serviciosCrmsXLandings', ['as'=> 'admin.serviciosCrmsXLandings.store', 'uses' => 'Admin\ServiciosCrmsXLandingController@store', 'middleware' => ['auth']]);
Route::get('admin/serviciosCrmsXLandings/create/{landing_id}', ['as'=> 'admin.serviciosCrmsXLandings.create', 'uses' => 'Admin\ServiciosCrmsXLandingController@create', 'middleware' => ['auth']]);
Route::put('admin/serviciosCrmsXLandings/{serviciosCrmsXLandings}', ['as'=> 'admin.serviciosCrmsXLandings.update', 'uses' => 'Admin\ServiciosCrmsXLandingController@update', 'middleware' => ['auth']]);
Route::patch('admin/serviciosCrmsXLandings/{serviciosCrmsXLandings}', ['as'=> 'admin.serviciosCrmsXLandings.update', 'uses' => 'Admin\ServiciosCrmsXLandingController@update', 'middleware' => ['auth']]);
Route::delete('admin/serviciosCrmsXLandings/{serviciosCrmsXLandings}', ['as'=> 'admin.serviciosCrmsXLandings.destroy', 'uses' => 'Admin\ServiciosCrmsXLandingController@destroy', 'middleware' => ['auth']]);
Route::get('admin/serviciosCrmsXLandings/{serviciosCrmsXLandings}', ['as'=> 'admin.serviciosCrmsXLandings.show', 'uses' => 'Admin\ServiciosCrmsXLandingController@show', 'middleware' => ['auth']]);
Route::get('admin/serviciosCrmsXLandings/{serviciosCrmsXLandings}/edit', ['as'=> 'admin.serviciosCrmsXLandings.edit', 'uses' => 'Admin\ServiciosCrmsXLandingController@edit', 'middleware' => ['auth']]);


Route::get('admin/landingsCamposServicios', ['as'=> 'admin.landingsCamposServicios.index', 'uses' => 'Admin\LandingsCamposServicioController@index', 'middleware' => ['auth']]);
Route::post('admin/landingsCamposServicios', ['as'=> 'admin.landingsCamposServicios.store', 'uses' => 'Admin\LandingsCamposServicioController@store', 'middleware' => ['auth']]);
Route::get('admin/landingsCamposServicios/create', ['as'=> 'admin.landingsCamposServicios.create', 'uses' => 'Admin\LandingsCamposServicioController@create', 'middleware' => ['auth']]);
Route::put('admin/landingsCamposServicios/{landingsCamposServicios}', ['as'=> 'admin.landingsCamposServicios.update', 'uses' => 'Admin\LandingsCamposServicioController@update', 'middleware' => ['auth']]);
Route::patch('admin/landingsCamposServicios/{landingsCamposServicios}', ['as'=> 'admin.landingsCamposServicios.update', 'uses' => 'Admin\LandingsCamposServicioController@update', 'middleware' => ['auth']]);
Route::delete('admin/landingsCamposServicios/{landingsCamposServicios}', ['as'=> 'admin.landingsCamposServicios.destroy', 'uses' => 'Admin\LandingsCamposServicioController@destroy', 'middleware' => ['auth']]);
Route::get('admin/landingsCamposServicios/{landingsCamposServicios}', ['as'=> 'admin.landingsCamposServicios.show', 'uses' => 'Admin\LandingsCamposServicioController@show', 'middleware' => ['auth']]);
Route::get('admin/landingsCamposServicios/{landingsCamposServicios}/edit', ['as'=> 'admin.landingsCamposServicios.edit', 'uses' => 'Admin\LandingsCamposServicioController@edit', 'middleware' => ['auth']]);


Route::get('admin/landingsEnviadosXServicios', ['as'=> 'admin.landingsEnviadosXServicios.index', 'uses' => 'Admin\LandingsEnviadosXServicioController@index', 'middleware' => ['auth']]);
Route::post('admin/landingsEnviadosXServicios', ['as'=> 'admin.landingsEnviadosXServicios.store', 'uses' => 'Admin\LandingsEnviadosXServicioController@store', 'middleware' => ['auth']]);
Route::get('admin/landingsEnviadosXServicios/create', ['as'=> 'admin.landingsEnviadosXServicios.create', 'uses' => 'Admin\LandingsEnviadosXServicioController@create', 'middleware' => ['auth']]);
Route::put('admin/landingsEnviadosXServicios/{landingsEnviadosXServicios}', ['as'=> 'admin.landingsEnviadosXServicios.update', 'uses' => 'Admin\LandingsEnviadosXServicioController@update', 'middleware' => ['auth']]);
Route::patch('admin/landingsEnviadosXServicios/{landingsEnviadosXServicios}', ['as'=> 'admin.landingsEnviadosXServicios.update', 'uses' => 'Admin\LandingsEnviadosXServicioController@update', 'middleware' => ['auth']]);
Route::delete('admin/landingsEnviadosXServicios/{landingsEnviadosXServicios}', ['as'=> 'admin.landingsEnviadosXServicios.destroy', 'uses' => 'Admin\LandingsEnviadosXServicioController@destroy', 'middleware' => ['auth']]);
Route::get('admin/landingsEnviadosXServicios/{landingsEnviadosXServicios}', ['as'=> 'admin.landingsEnviadosXServicios.show', 'uses' => 'Admin\LandingsEnviadosXServicioController@show', 'middleware' => ['auth']]);
Route::get('admin/landingsEnviadosXServicios/{landingsEnviadosXServicios}/edit', ['as'=> 'admin.landingsEnviadosXServicios.edit', 'uses' => 'Admin\LandingsEnviadosXServicioController@edit', 'middleware' => ['auth']]);
