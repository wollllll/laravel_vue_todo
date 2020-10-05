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
     * すべてのTODO取得
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->todo->get();
    }
}

