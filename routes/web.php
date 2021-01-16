<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Articulo;
use App\Http\Controllers\HomeController; 
use App\Categoria; 

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
   	$articulos_recientes = Articulo::latest()
	 ->take(3)
	 ->get();
	return view('welcome',['recientes' => $articulos_recientes]);
})->name('main');


Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');


	Route::resource('AdminArticulos','App\Http\Controllers\ArticuloController');
	Route::resource('AdminCategorias','App\Http\Controllers\CategoriaController');



Route::resource('show','App\Http\Controllers\showController');

Route::resource('comment','App\Http\Controllers\CommentarioController');

Route::get('/profile/{id}', function($id){
	$user = User::findOrFail($id);
	return view('profile',['user' => $user]);
});

Route::get('categorias', function(){
	$categorias = Categoria::all();
	return view('admin.articulos.index',['categorias'=>$categorias]);
})->name('index.categorias');


Auth::routes();