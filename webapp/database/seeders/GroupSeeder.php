<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    public function run()
    {
        DB::table('groups')->insert([
            ['name' => '営業部'],
            ['name' => '開発部'],
            ['name' => '総務部'],
        ]);
    }
}