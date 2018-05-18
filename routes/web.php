
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Rutas Prospecto
 */
Route::get('prospectos/registro', [
	'uses' => 'ProspectosController@registro',
	'middleware' => 'auth',
	'as' => 'prospectos.create'
]);

Route::post('prospectos/codigopostal', [
	'uses' => 'ProspectosController@codigoPostal',
	'middleware' => 'auth',
]);

Route::post('prospectos/cambioetapa/{id}', [
	'uses' => 'ProspectosController@cambioEtapa',
	'middleware' => 'auth',
]);
 
Route::post('prospectos/contactos/{id}', [
	'uses' => 'ProspectosController@contactos',
	'middleware' => 'auth',
]);

Route::post('prospectos/direccionesupdate/{id}', [
	'uses' => 'ProspectosController@direccionesUpdate',
	'middleware' => 'auth',
]);

Route::post('prospectos/telefonosupdate/{id}', [
	'uses' => 'ProspectosController@telefonosUpdate',
	'middleware' => 'auth',
]);

Route::post('prospectos/prospectosupdate/{id}', [
	'uses' => 'ProspectosController@prospectosUpdate',
	'middleware' => 'auth',
]);

Route::post('prospectos/registro', [
	'uses' => 'ProspectosController@store',
	'middleware' => 'auth'
]);

Route::get('prospectos/view/{id}', [
	'uses' => 'ProspectosController@view',
	'middleware' => [
		'auth',
		'permiso'
	],
	'as' => 'prospectos.show'
]);

Route::get('prospectos/index', [
	'uses' => 'ProspectosController@index',
	'middleware' => [
		'auth',
		'permiso'
	],
	'as' => 'prospectos.index'
]);

Route::get('prospectos/update/{id}', [
	'uses' => 'ProspectosController@update',
	'middleware' => [
		'auth',
		'permiso'
	],
	'as' => 'prospectos.update'
]);

Route::get('prospectos/destroy/{id}', [
	'uses' => 'ProspectosController@index',
	'middleware' => [
		'auth',
		'permiso'
	],
	'as' => 'prospectos.destroy'
]);

Route::post('prospectos/comentarios/{id}', [
	'uses' => 'ProspectosController@comentarios',
	'middleware' => [
		'auth',
		'permiso'
	],
	'as' => 'prospectos.comentarios'
]);

Route::post('prospectos/direccion/{id}', [
	'uses' => 'ProspectosController@direccion',
	'middleware' => [
		'auth',
		'permiso'
	],
	'as' => 'prospectos.direccion'
]);
/**
 * Rutas Roles
 */
Route::get('roles/index', [
	'as' => 'roles.index',
	'uses' => 'RolesController@index',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('roles/create', [
	'as' => 'roles.create',
	'uses' => 'RolesController@create',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('roles/show/{id}', [
	'as' => 'roles.show',
	'uses' => 'RolesController@show',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('roles/update/{id}', [
	'as' => 'roles.update',
	'uses' => 'RolesController@update',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('roles/destroy/{id}', [
	'as' => 'roles.destroy',
	'uses' => 'RolesController@destroy',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::post('roles/store', [
	'uses' => 'RolesController@store',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::post('roles/edit/{id}', [
	'uses' => 'RolesController@edit',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

/**
 * Rutas Permisos
 */

Route::get('permisos/index', [
	'as' => 'permisos.index',
	'uses' => 'PermisosController@index',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('permisos/create', [
	'as' => 'permisos.create',
	'uses' => 'PermisosController@create',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('permisos/show/{id}', [
	'as' => 'permisos.show',
	'uses' => 'PermisosController@show',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('permisos/update/{id}', [
	'as' => 'permisos.update',
	'uses' => 'PermisosController@update',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('permisos/destroy/{id}', [
	'as' => 'permisos.destroy',
	'uses' => 'PermisosController@destroy',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::post('permisos/store', [
	'uses' => 'PermisosController@store',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::post('permisos/edit/{id}', [
	'uses' => 'PermisosController@edit',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

/**
 * Rutas RolesUsuario
 */
Route::get('rolesusuario/index', [
	'as' => 'rolesusuario.index',
	'uses' => 'RolesUsuarioController@index',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('rolesusuario/create', [
	'as' => 'rolesusuario.create',
	'uses' => 'RolesUsuarioController@create',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('rolesusuario/show/{id}', [
	'as' => 'rolesusuario.show',
	'uses' => 'RolesUsuarioController@show',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('rolesusuario/update/{id}', [
	'as' => 'rolesusuario.update',
	'uses' => 'RolesUsuarioController@update',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('rolesusuario/destroy/{id}', [
	'as' => 'rolesusuario.destroy',
	'uses' => 'RolesUsuarioController@destroy',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::post('rolesusuario/store', [
	'uses' => 'RolesUsuarioController@store',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::post('rolesusuario/edit/{id}', [
	'uses' => 'RolesUsuarioController@edit',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

/**
 * Rutas PermisoRoles
 */
Route::get('permisosrol/index', [
	'as' => 'permisosrols.index',
	'uses' => 'PermisosRolController@index',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('permisosrol/create', [
	'as' => 'permisosrols.create',
	'uses' => 'PermisosRolController@create',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('permisosrol/show/{id}', [
	'as' => 'permisosrols.show',
	'uses' => 'PermisosRolController@show',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('permisosrol/update/{id}', [
	'as' => 'permisosrols.update',
	'uses' => 'PermisosRolController@update',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('permisosrol/destroy/{id}', [
	'as' => 'permisosrols.destroy',
	'uses' => 'PermisosRolController@destroy',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::post('permisosrol/store', [
	'uses' => 'PermisosRolController@store',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::post('permisosrol/edit/{id}', [
	'uses' => 'PermisosRolController@edit',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

/**
 * Rutas Users
 */
Route::get('users/index', [
	'as' => 'users.index',
	'uses' => 'UsersController@index',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('users/create', [
	'as' => 'users.create',
	'uses' => 'UsersController@create',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('users/show/{id}', [
	'as' => 'users.show',
	'uses' => 'UsersController@show',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('users/update/{id}', [
	'as' => 'users.update',
	'uses' => 'UsersController@update',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::get('users/destroy/{id}', [
	'as' => 'users.destroy',
	'uses' => 'UsersController@destroy',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::post('users/store', [
	'uses' => 'UsersController@store',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

Route::post('users/edit/{id}', [
	'uses' => 'UsersController@edit',
	'middleware' => [
		'auth',
		'permiso'
	]
]);

/**
 * Oportunidades
 */
Route::get('oportunidades/index', [
	'uses' => 'OportunidadesController@index',
	'as' => 'oportunidades.index',
	'middleware' => [
		'auth',
		//'permiso'
	]
]);

Route::get('oportunidades/create', [
	'as' => 'oportunidades.create',
	'uses' => 'OportunidadesController@create',
	'middleware' => [
		'auth',
		/*'permiso'*/
	]
]);

Route::get('oportunidades/show/{id}', [
	'as' => 'oportunidades.show',
	'uses' => 'OportunidadesController@show',
	'middleware' => [
		'auth',
		/*'permiso'*/
	]
]);

Route::get('oportunidades/update/{id}', [
	'as' => 'oportunidades.update',
	'uses' => 'OportunidadesController@update',
	'middleware' => [
		'auth',
		/*'permiso'*/
	]
]);

Route::get('oportunidades/destroy/{id}', [
	'as' => 'oportunidades.destroy',
	'uses' => 'OportunidadesController@destroy',
	'middleware' => [
		'auth',
		/*'permiso'*/
	]
]);

Route::post('oportunidades/store', [
	'uses' => 'OportunidadesController@store',
	'middleware' => [
		'auth',
		/*'permiso'*/
	]
]);

Route::post('oportunidades/edit/{id}', [
	'uses' => 'OportunidadesController@edit',
	'middleware' => [
		'auth',
		/*'permiso'*/
	]
]);

Route::post('oportunidades/avanza', [
	'uses' => 'OportunidadesController@avanza',
	'middleware' => [
		'auth',
		/*'permiso'*/
	]
]);

Route::post('oportunidades/saveoportunidades', [
	'uses' => 'OportunidadesController@saveOportunidades',
	'middleware' => [
		'auth',
		/*'permiso'*/
	]
]);

Route::get('oportunidades/avanzados/{id_prospecto}/{tipo_registro}', [
	'uses' => 'OportunidadesController@avanzaRedirect',
	'middleware' => [
		'auth',
		/*'permiso'*/
	]
]);
