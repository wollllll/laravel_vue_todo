<?php

namespace App\Repositories\Todo;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;

class TodoRepository implements TodoRepositoryInterface
{
    /** @var Todo */
    private $todo;

    /**
     * TodoRepository constructor.
     * @param Todo $todo
     */
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * TODO取得処理
     *
     * @param int $id
     * @return Todo
     */
    public function findById(int $id): Todo
    {
        return $this->todo->find($id);
    }

    /**
     * すべてのTODO取得
     *
     * @param $search
     * @return Collection
     */
    public function getAll($search): Collection
    {
        return $this->todo->where('content', 'LIKE', '%' . $search . '%')->get();
    }

    /**
     * TODO削除処理
     *
     * @param Todo $todo
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Todo $todo)
    {
        return $todo->delete();
    }
}

