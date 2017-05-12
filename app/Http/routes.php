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
