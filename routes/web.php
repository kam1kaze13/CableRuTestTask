<?php

use Illuminate\Support\Facades\Route;

//MainPage
Route::get('/', 'App\Http\Controllers\MainController@home');

//Stats
Route::get('/stats', 'App\Http\Controllers\StatsController@home');
Route::get('/stats/name={name}', 'App\Http\Controllers\StatsController@getUsersByName');
Route::get('/stats/popularNames', 'App\Http\Controllers\StatsController@getPopularNames');