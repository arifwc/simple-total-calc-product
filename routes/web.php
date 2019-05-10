<?php

use App\Menu;
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

// Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('menu', 'MenuController');

Route::get('/menu',function(){
    $menu = Menu::all();
    return view('menuView',compact('menu'));
});

Route::post('/tambah','PesananController@tambah');
Route::get('/keranjang', 'PesananController@liatKeranjang');