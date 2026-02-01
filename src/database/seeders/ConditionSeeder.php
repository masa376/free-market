<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = [
            ['item_condition' => '良好'],
            ['item_condition' => '目立った傷や汚れなし'],
            ['item_condition' => 'やや傷や汚れあり'],
            ['item_condition' => '状態が悪い'],
        ];

        DB::table('conditions')->insert($conditions);
    }
}
