<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function store(Request $request)
    {
        $inputs = $request->all();

        $todo = Todo::create($inputs);

        return response()->json([
            'todo' => $todo
        ]);
    }
}
