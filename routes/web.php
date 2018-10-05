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

/*---------- RUTAS DE LOGIN ----------------*/
Route::get('/', function () {
  return view('login');
})->name('login');

Route::post('auth', 'LoginController@login')->name('auth');
Route::post('/logout', 'LoginController@logout')->name('logout');


Route::group(['middleware' => 'auth'], function() { //middleware auth

  	/* ---- Ruta para llamar al dashboard, modificarla si es necesario ----- */
	Route::get('dashboard', 'LoginController@index')->name('dashboard');

	/* --- Usuarios ---*/
	Route::resource('/users','UserController',["middleware" => 'rol_admin']);

	/* --- redes ---*/
	Route::resource('redes','RedesController');
  Route::post('saveClick','RedesController@saveClick')->name('saveClick');
  Route::get('reportes','RedesController@reporteClick')->name('reporteClick');
  Route::post('reportes/busqueda','RedesController@busquedaClick')->name('busqueda_click');
  Route::get('reportesClicks/pdf/{id}/{fecha}','RedesController@pdf')->name('sv_pdf');

	// prospectos
	Route::resource('prospectos','ProspectosController');
	Route::get('prospectos/pdf/{id}','ProspectosController@pdf')->name('p_pdf');
	Route::get('prospectos/eliminar/{id}','ProspectosController@eliminar')->name('pros.eliminar');

	// requerimientos
	Route::resource('req','RequerimientosController');
	Route::get('req/pdf/{id}','RequerimientosController@pdf')->name('r_pdf');
	Route::get('req/eliminar/{id}','RequerimientosController@eliminar')->name('req.eliminar');

  // futuros clientes
  Route::resource('fc','FcController');
  Route::get('fc/pdf/{id}','FcController@pdf')->name('fc_pdf');
  Route::get('fc/eliminar/{id}','FcController@eliminar')->name('fc.eliminar');

  // ubicaciones
  Route::resource('ubi','UbicacionesController');
	//departamentos, provincias y distritos
	Route::resource('departamentos','DepartamentoController');
	Route::resource('provincias','ProvinciaController');
	Route::resource('distritos','DistritoController');
	Route::get('prov/{id}','ProvinciaController@busProv');
	Route::get('dist/{id}','DistritoController@busDist');

	//* --- Perfil --- */
	Route::get('/perfil', 'UserController@perfil')->name('perfil');
	Route::patch('/perfil', 'UserController@update_perfil')->name('update_perfil');

	Route::get('users_status/{id}', 'UserController@userStatus');
	Route::put('update_status/{id}', 'UserController@updateStatusUser');

	Route::get('img/{filename}',function($filename){

		// ubicacion de la ruta en storage
		$path = storage_path("app/images/$filename");

		if (!\File::exists($path)){
			abort(404);
		}

		$file = \File::get($path);
		$type = \File::mimeType($path);
		$response = Response::make($file,200);
		$response->header("Content-Type", $type);

		return $response;
	});

});
