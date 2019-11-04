<?php



// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'userSempliceController@index')-> name('home.index');
Route::get('/apartment_create', 'userAuthController@create') -> name('apartment.create');
Route::post('/apartment_store', 'userAuthController@store' ) -> name('apartment.store');
