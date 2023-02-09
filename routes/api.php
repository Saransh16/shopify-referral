<?php

use Illuminate\Support\Facades\Route;


Route::get('/states', 'MiscController@listStates');
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

Route::get('/campaigns/{id}', 'CampaignController@show');

Route::post('/participants/campaign/{id}', 'ParticipantController@joinCampaign');


Route::group(['middleware' => ['auth:sanctum']], function () {

  Route::group(['prefix' => 'campaigns'], function () {

      // Route::get('/', 'RaffleController@listForAdmin');

      Route::post('/', 'CampaignController@create');

      // Route::put('/{id}', 'RaffleController@update');

      // Route::delete('/{id}', 'RaffleController@delete');
  });

  Route::group(['prefix' => 'participants'], function () {

    Route::post('/', 'ParticipantController@create');

    Route::post('/import-csv', 'ParticipantController@importReaderFromCsv');

  });  
  
  Route::get('users', 'UserController@list');

  Route::post('logout', "AuthController@logout");
    
});
