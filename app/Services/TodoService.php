<?php

namespace App\Services;

use App\Models\Todo;
use App\Repositories\Todo\TodoRepository;
use Illuminate\Support\Facades\DB;

class TodoService
{
    /** @var TodoRepository */
    private $todoRepository;

    /**
     * TodoService constructor.
     * @param TodoRepository $todoRepository
     */
    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    /**
     * TODO保存処理
     *
     * @param array $inputs
     * @return Todo
     */
    public function store(array $inputs): Todo
    {
        try {
            DB::beginTransaction();

            $todo = $this->todoRepository->create($inputs);

            DB::commit();

            return $todo;
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
            DB::rollBack();
        }
    }

    /**
     * TODO位置更新処理
     *
     * @param array $inputs
     * @param Todo $todo
     */
    public function update(array $inputs, Todo $todo): void
    {
        try {
            DB::beginTransaction();

            $this->todoRepository->update($todo, $inputs);

            DB::commit();
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
            DB::rollBack();
        }
    }
}
