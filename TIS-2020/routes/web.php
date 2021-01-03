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
})->name('welcome');

//Route::post('/welcome', 'Auth\UsuarioLoginController@loginWelcome')->name('usuario.login.submit.welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('usuario')->group(function() {
    Route::get('/login', 'Auth\UsuarioLoginController@showLoginForm')->name('usuario.login');
    Route::post('/login', 'Auth\UsuarioLoginController@login')->name('usuario.login.submit');
    Route::get('/', 'UsuarioController@index')->name('usuario.dashboard');
    Route::get('/logout', 'Auth\UsuarioLoginController@logout')->name('usuario.logout');
});

//Route::get('/usuario', 'UsuarioController@index')->name('usuarios');

Route::group(['middleware' => ['web']], function() {
    Route::resource('registrarFacultad','FacultadController');
    Route::POST('addFacultad','FacultadController@addFacultad');
    Route::POST('editFacultad','FacultadController@editFacultad');
    Route::POST('deleteFacultad','FacultadController@deleteFacultad');
  });

  Route::group(['middleware' => ['web']], function() {
    Route::resource('registrarDepartamento','DepartamentoController');
    Route::POST('addDepartamento','DepartamentoController@addDepartamento');
    Route::POST('editDepartamento','DepartamentoController@editDepartamento');
    Route::POST('deleteDepartamento','DepartamentoController@deleteDepartamento');
  });

  //Route::group(['middleware' => ['usuarios']], function() {
    //Route::POST('post/index','FomularioController@addPost');
    Route::POST('addFormulario','FomularioController@addPost');
    Route::POST('editFormulario','FomularioController@editPost');
    Route::POST('deleteFormulario','FomularioController@deletePost');
  //});

Route::get('post', function () {
    return view('post/index', compact('Auth::user()->nombre'));
})->name('post');


Route::get('auth/password', 'PasswordController@index')->name('cambiar.password');
Route::POST('auth/password', 'PasswordController@cambiar')->name('cambiar.password.submit');

/////////////ADMIN//////////////////////
Route::get('/adminHome', 'AdminController@index')->name('admin.home');
Route::get('/register', 'AdminController@indexusuarios')->name('admin.usuarios');
Route::post('/register', 'Auth\RegisterController@create')->name('admin.usuarios');
Route::get('/registrarMaterias', 'AdminController@indexmaterias')->name('admin.materias');
Route::post('addMateria', 'AdminController@creatematerias')->name('admin.materias');
Route::post('addGrupo', 'AdminController@creategrupo')->name('admin.grupo');
Route::get('/registrarUnidades', 'AdminController@indexunidades')->name('admin.unidades');
Route::get('/registrarPlataformasHerramientas', 'AdminController@indexherramientas')->name('admin.herramientas');

//////////////HERRAMIENTAS Y PLATAFORMAS ///////////////////////////////
Route::post('/addHerramienta', 'HerramientaController@addHerramienta')->name('add.herramientas');
Route::post('/addPlataforma', 'PlataformaController@addPlataforma')->name('add.plataforma');


/////////////SECRETARIA//////////////
Route::get('/secretariaHome', 'SecretariaController@index')->name('secretaria.home');
Route::get('/reporteAuxAsistencia', 'SecretariaController@indexasistencia')->name('secretaria.asistencia');
Route::get('/reporteAuxDpaUti', 'SecretariaController@indexDpaUti')->name('secretaria.DpaUti');
Route::get('/reporteAuxResumen', 'SecretariaController@indexresumen')->name('secretaria.resumen');


///////////JEFE DE DEPARTAMENTO /////////////
Route::get('/jefeHome', 'JefeController@index')->name('jefeDepartamento.home');
Route::get('/reporteDocAsistencia', 'JefeController@indexasistencia')->name('jefeDepartamento.asistencia');
Route::get('/reporteDocDpaUti', 'JefeController@indexDpaUti')->name('jefeDepartamento.DpaUti');
Route::get('/reporteDocResumen', 'JefeController@indexresumen')->name('jefeDepartamento.resumen');
//Route::get('/reporteAuxResumen', 'SecretariaController@indexresumen')->name('secretaria.resumen');addFormulario
//Route::get('/', 'UsuarioController@index')->name('usuario.dashboard');

/*Route::prefix('usuario')->group(function() {
  Route::get('/login', 'Auth\UsuarioLoginController@showLoginForm')->name('usuario.login');
  Route::post('/login', 'Auth\UsuarioLoginController@login')->name('usuario.login.submit');
  Route::get('/', 'UsuarioController@index')->name('usuario.dashboard');
  Route::get('/logout', 'Auth\UsuarioLoginController@logout')->name('usuario.logout');
});*/