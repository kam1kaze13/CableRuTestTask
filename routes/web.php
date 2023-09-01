<?php

use Illuminate\Support\Facades\Route;

//MainPage
Route::get('/', 'App\Http\Controllers\MainController@home');

//Stats
Route::get('/stats', 'App\Http\Controllers\StatsController@home');
Route::get('/stats/getUsersByName', 'App\Http\Controllers\StatsController@getUsersByName');
Route::get('/stats/getUsersByAgeRange', 'App\Http\Controllers\StatsController@getUsersByAgeRange');
Route::get('/stats/popularNames', 'App\Http\Controllers\StatsController@getPopularNames');