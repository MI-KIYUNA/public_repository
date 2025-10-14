<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradeSeeder extends Seeder
{
    public function run()
    {
        DB::table('grades')->insert([
            ['name' => 'S', 'rank' => 1],
            ['name' => 'A', 'rank' => 2],
            ['name' => 'B', 'rank' => 3],
        ]);
    }
}