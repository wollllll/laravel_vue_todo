<?php

namespace App\Repositories\Todo;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

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
     * すべてのTODO取得
     *
     * @param $query
     * @return Collection
     */
    public function getAll($query): Collection
    {
        return $this->todo->where('content', 'LIKE', '%' . $query . '%')->get();
    }
}

