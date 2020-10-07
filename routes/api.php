<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {
    Route::get('/todos/getAll', 'TodoController@getAll');
    Route::resource('todos', 'TodoController', ['only' => ['store', 'update', 'destroy']]);
});
