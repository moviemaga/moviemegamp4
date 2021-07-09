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

use  Illuminate\Support\Facades\Mail;
use moviemega\User;
use Illuminate\Http\Request;
Route::get('/legal', function () {
    return view('legal');

});

Route::get('/','MovieclienteController@index');
Route::get('/public','PublicidadController@show')->name('public');
Route::get('/publicp','PublicidadpController@show')->name('publicp');
Route::get('/publico','PublicidadController@showo')->name('publico');
Route::get('/programindex','ProgramclienteController@index');
Route::get('detalle/movies/{movie}','MovieclienteController@show')->name('detalle');
Route::get('detalle/programs/{program}','ProgramclienteController@show')->name('detalle');
Route::resource('categories', 'CategoryController');
Route::resource('comentarios', 'ComentarioController');
Route::resource('comentariops', 'ComentariopController');
Route::resource('categorieps', 'CategoriepController');
Route::resource('languages', 'LanguageController');
Route::resource('movies', 'MovieController');
Route::resource('programs', 'ProgramController');
Route::resource('publicidads', 'PublicidadController');
Route::resource('publicidadps', 'PublicidadpController');


Route::resource('language_movies', 'Language_MovieController');
Route::resource('servers', 'ServerController');
Route::get('language_movies', 'Language_MovieController@store');

Route::resource('scrims', 'ScrimController');
Route::resource('scrimps', 'ScrimpController');
Route::resource('unloadings', 'UnloadingController');
Route::resource('unloadingps', 'UnloadingpController');

Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/register/verify/{code}', 'Auth\RegisterController@verify');



//formulario reiniciocontra
Route::get('/reiniciopassform', 'Auth\ResetPasswordController@reiniciopassform');
//formulario actualizarpassform
Route::get('/actualizarpassform/{token}/{email}', 'Auth\ResetPasswordController@actualizarpassform');

Route::get('/reiniciopass','Auth\ResetPasswordController@reiniciopass')->name('reiniciopass');

Route::get('/actualizarpass','Auth\ResetPasswordController@actualizarpass')->name('actualizarpass');




