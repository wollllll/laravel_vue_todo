<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserts = [];

        for ($i = 1; $i < 5; $i++) {
            $inserts[] = [
                'content' =>  sprintf('content%dです', $i),
                'top' => 50
            ];
        }

        DB::table('todos')->insert($inserts);
    }
}
