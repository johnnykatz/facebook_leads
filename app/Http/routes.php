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
Route::get('callback', 'API\pruebas@callback');
