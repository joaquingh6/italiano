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

Route::get('/perfil','UserController@perfil')->name('perfil');
Route::post('/editarperfil/{id}', 'UserController@editarPerfil')->name('editarperfil');
Route::get('/galeria' , 'ImagenesController@galeria')->name('galeria');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/registrarUsuarios', 'UserController@RegistrarUsuarios')->name('registrarUsuarios');

Route::post('/votar/{foto}','VotosController@votarFoto')->name('votarfoto');
Route::post('/votarguest/{foto}','VotosController@votarFotoGuest')->name('votarfotoguest');

Route::middleware(['admin'])->group(function () {
   Route::group(array('prefix' => 'admin'), function() {

   		Route::get('/','AdminController@index')->name('admin');

   		Route::post('/confirmar/{foto}','AdminController@confirmarFoto')->name('confirmarfoto');
   });

});

