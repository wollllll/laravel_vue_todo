<?php

namespace App\Repositories\Todo;

interface TodoRepositoryInterface
{
    /**
     * すべてのTODO取得
     *
     * @return mixed
     */
    public function getAll();
}
