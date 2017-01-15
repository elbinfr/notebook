<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('notebooks/{slug}/open', 'NotebookController@open')->middleware('auth');
Route::resource('notebooks', 'NotebookController');

Route::resource('notes', 'NoteController');

Route::get('image/{type}/{image}', function($type, $image){
    $url = storage_path() . "/app/public/$type/$image";
    if(file_exists($url)){
        return Response::download($url);
    }
});