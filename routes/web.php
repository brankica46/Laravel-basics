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

//ruta sa funkcijom

Route::get('onama', function () {
    return view('onama');
});

Route::get('galerija', function () {
    return view('galerija');
});

Route::get('kontakt', function () {
    return view('kontakt');
});

Auth::routes();

//ruta sa akcijom
//kad se klikne na home, idi na kontroler home i idi kroz njega do akcije index


//dodavanje ruta za model Blog


//dodavanje ruta za posts
Route::resource('posts', 'PostController');

Route::resource('categories', 'CategoryController');

Route::get('/', 'ListController@index');
Route::resource('/lists', 'ListController');

Route::group(['middleware' => ['auth']], function() {
  Route::resource('posts', 'PostController');
  Route::get('/home', 'HomeController@index');
  Route::resource('blogs', 'BlogController');
});

Route::get('contact', 'MailController@contact');
Route::post('contact/send', 'MailController@send');
