<?php

Route::get('/', function () {
    return view('layouts.main-layout');
});

Auth::routes();

// Visualizzazione degli appartamenti nella home
Route::get('/', 'userSempliceController@index')-> name('home.index');

// Visualizzazione ricerche e appartamenti della home
Route::get('/apartment_search', 'userSempliceController@search')-> name('apartment.search');

// Creazione appartamenti
Route::get('/apartment_create', 'userAuthController@create') -> name('apartment.create');
Route::post('/apartment_store', 'userAuthController@store' ) -> name('apartment.store');

// Visualizzazione di un appartamento e possibilità di inviare messaggio al proprietario
Route::get('/apartment/{id}', 'userSempliceController@show')-> name('apartment.show');
Route::post('/message_store/{id}', 'userSempliceController@messageStore') -> name('message.store');

// Visualizzazione dei propri appartamenti
Route::get('/myapartments_show', 'userAuthController@myapartmentShow') -> name('myapartment.show');

// Modifica dei propri appartamenti
Route::get('/apartment/{id}/edit/', 'userAuthController@edit') -> name('apartment.edit');
Route::post('update/{id}', 'userAuthController@update' ) -> name('apartment.update');

// Visualizzazione dei propri messaggi
Route::get('/mymessages_show', 'userAuthController@messagesShow') -> name('messages.show');

// Cancellazione appartamento
Route::get('/delete/{id}', 'userAuthController@destroy')-> name('apartment.destroy');

// Sponsorizzazione
Route::get('/sponsorship', 'userAuthController@sponsorshipCreate') -> name('sponsorship.create');
