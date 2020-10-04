<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {
    Route::get('/todos/getAll', 'TodoController@getAll');
    Route::post('/todos', 'TodoController@store');
});
