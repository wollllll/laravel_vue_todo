<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreRequest;
use App\Models\Todo;
use App\Repositories\Todo\TodoRepository;
use App\Services\TodoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /** @var TodoService */
    private $service;

    /** @var TodoRepository */
    private $repository;

    /**
     * TodoController constructor.
     * @param TodoService $service
     * @param TodoRepository $repository
     */
    public function __construct(TodoService $service, TodoRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    /**
     * すべてのTODO取得
     *
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $todos = $this->repository->getAll();

        return response()->json([
            'todos' => $todos
        ]);
    }

    /**
     * TODO保存処理
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        $todo = $this->service->store($request->all());

        return response()->json([
            'todo' => $todo
        ]);
    }

    /**
     * TODO位置更新処理
     *
     * @param Request $request
     * @param Todo $todo
     * @return JsonResponse
     */
    public function update(Request $request, Todo $todo): JsonResponse
    {
        $this->service->update($request->all(), $todo);

        return response()->json([
            'status' => 'success'
        ]);
    }
}
