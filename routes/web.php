<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
// Route::resource('servicios','App\Http\Controllers\Servicios2Controller')->names('servicios')->middleware('auth');

Route::resource('servicios','App\Http\Controllers\Servicios2Controller')->names('servicios');

//ruta del controlador servicios usado
//Route::get('servicios', 'App\Http\Controllers\Servicios2Controller@index')->name('servicios');

// Route::get('servicios', 'App\Http\Controllers\Servicios2Controller@index')->name('servicios');
// Route::get('servicios/crear', 'App\Http\Controllers\Servicios2Controller@create')->name('servicios.create');
// //ruta editar
// Route::get('servicios/{id}/editar', 'App\Http\Controllers\Servicios2Controller@edit')->name('servicios.edit');
// //ruta modificar con el metodo parcial partch
// Route::patch('servicios/{id}', 'App\Http\Controllers\Servicios2Controller@update')->name('servicios.update');
// //ruta  store con metodo pos
// Route::post('servicios', 'App\Http\Controllers\Servicios2Controller@store')->name('servicios.store');
// Route::get('servicios/{id}', 'App\Http\Controllers\Servicios2Controller@show')->name('servicios.show');
// //ruta eliminar con metodo destroy
// Route::delete('servicios/{servicio}', 'App\Http\Controllers\Servicios2Controller@destroy')->name('servicios.destroy');
Route::view('contacto', 'contacto')->name('contacto');
//contacto
Route::post('contacto', 'App\Http\Controllers\ContactoController@store');


Auth::routes(['register'=> true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// DB::listen(function($query){
//     var_dump($query->sql);
// });

Route::resource('servicios', 'App\Http\Controllers\Servicios2Controller')->names('servicios');
//    ->middleware('auth');

Route::get('categorias/{category}', 'App\Http\Controllers\CategoryController@show')->name('categories.show');