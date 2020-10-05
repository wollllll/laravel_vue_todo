<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Services\TodoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    /** @var $service */
    private $service;

    /**
     * TodoController constructor.
     * @param TodoService $service
     */
    public function __construct(TodoService $service)
    {
        $this->service = $service;
    }

    public function getAll()
    {
        Log::debug('aa');
        $todos = Todo::get();

        return response()->json([
            'todos' => $todos
        ]);
    }

    public function store(Request $request): JsonResponse
    {
        $todo = $this->service->store($request->all());

        return response()->json([
            'todo' => $todo
        ]);
    }

    public function update(Request $request, Todo $todo): JsonResponse
    {
        $this->service->update($request->all(), $todo);

        return response()->json([
            'status' => 'success'
        ]);
    }
}
