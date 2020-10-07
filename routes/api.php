<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {
    Route::get('/todos/getAll', 'TodoController@getAll');
    Route::post('/todos', 'TodoController@store');
    Route::put('/todos/{todo}', 'TodoController@update');
    Route::delete('/todos/{todo}', 'TodoController@destroy');
});
