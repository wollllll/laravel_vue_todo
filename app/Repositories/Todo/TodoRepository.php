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
     * @param $search
     * @return Collection
     */
    public function getAll($search): Collection
    {
        return $this->todo->where('content', 'LIKE', '%' . $search . '%')->get();
    }
}

