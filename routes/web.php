<?php

Route::get('/', function () {
    return view('layouts.main-layout');
});

Auth::routes();

Route::get('/', 'userSempliceController@index')-> name('home.index');

Route::get('/apartment_create', 'userAuthController@create') -> name('apartment.create');
Route::post('/apartment_store', 'userAuthController@store' ) -> name('apartment.store');

Route::get('/apartment/{id}', 'userSempliceController@show')-> name('apartment.show');

Route::get('/apartment/{id}/edit/', 'userAuthController@edit') -> name('apartment.edit');
Route::post('update/{id}', 'userAuthController@update' ) -> name('apartment.update');

Route::get('/delete/{id}', 'userAuthController@destroy')-> name('apartment.destroy');
