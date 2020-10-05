<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    // todo: 後でリファクタリング

    public function getAll()
    {
        Log::debug('aa');
        $todos = Todo::get();

        return response()->json([
            'todos' => $todos
        ]);
    }

    public function store(Request $request)
    {
        $inputs = $request->all();

        $todo = Todo::create(array_merge($inputs, [
            'top' => 50,
            'left' => 50
        ]));

        return response()->json([
            'todo' => $todo
        ]);
    }
}
