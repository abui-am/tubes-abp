<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/concerts', 'App\Http\Controllers\API\ConcertController@index');
Route::post('/concerts', 'App\Http\Controllers\API\ConcertController@store');
Route::get('/concerts/{id}', 'App\Http\Controllers\API\ConcertController@show');
Route::put('/concerts/{id}', 'App\Http\Controllers\API\ConcertController@update');
Route::delete('/concerts/{id}', 'App\Http\Controllers\API\ConcertController@destroy');
// Register
Route::post('/register', 'App\Http\Controllers\API\AuthController@store');
// Login
Route::post('/login', 'App\Http\Controllers\API\AuthController@login');

Route::get('/seats', 'App\Http\Controllers\API\SeatController@index');
Route::post('/seats', 'App\Http\Controllers\API\SeatController@store');
