<?php

namespace App\Services;

use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class TodoService
{
    public function store(array $inputs): Todo
    {
        try {
            DB::beginTransaction();

            $todo = Todo::create($inputs);

            DB::commit();

            return $todo;
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
            DB::rollBack();
        }
    }

    public function update(array $inputs, Todo $todo): void
    {
        try {
            DB::beginTransaction();

            $todo->update($inputs);

            DB::commit();
        } catch (\Exception $e) {
            abort(500, $e->getMessage());
            DB::rollBack();
        }
    }
}
