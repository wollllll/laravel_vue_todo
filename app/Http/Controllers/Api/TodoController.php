<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreRequest;
use App\Http\Requests\Todo\UpdateRequest;
use App\Models\Todo;
use App\Repositories\Todo\TodoRepository;
use App\Services\TodoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TodoController extends Controller
{
    /** @var TodoService */
    private $service;

    /** @var TodoRepository */
    private $todoRepository;

    /**
     * TodoController constructor.
     * @param TodoService $service
     * @param TodoRepository $repository
     */
    public function __construct(TodoService $service, TodoRepository $repository)
    {
        $this->service = $service;
        $this->todoRepository = $repository;
    }

    /**
     * すべてのTODO取得
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getAll(Request $request): JsonResponse
    {
        // todo queryの渡し方修正 nullになる
        $todos = $this->todoRepository->getAll(Arr::get($request->all(), 'search'));

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
        $todo = $this->service->store($request->validated());

        return response()->json([
            'todo' => $todo
        ]);
    }

    /**
     * TODO位置更新処理
     *
     * @param UpdateRequest $request
     * @param Todo $todo
     * @return JsonResponse
     */
    public function update(UpdateRequest $request, Todo $todo): JsonResponse
    {
        $this->service->update($request->all(), $todo);

        return response()->json([
            'status' => 'success'
        ]);
    }

    /**
     * TODO削除処理
     *
     * @param int $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function destroy(int $id): JsonResponse
    {
        $todo = $this->todoRepository->findById($id);
        $this->todoRepository->delete($todo);

        return response()->json([
            'todo' => $todo
        ]);
    }
}
