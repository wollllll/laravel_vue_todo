<?php

namespace App\Repositories\Todo;

interface TodoRepositoryInterface
{
    /**
     * すべてのTODO取得
     *
     * @param string $query
     * @return mixed
     */
    public function getAll(string $query);
}
