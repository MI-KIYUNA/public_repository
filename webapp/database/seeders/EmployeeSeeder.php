<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        DB::table('employees')->insert([
            ['name' => '山田太郎', 'email' => 'yamada@example.com', 'group_id' => 1, 'grade_id' => 1],
            ['name' => '田中花子', 'email' => 'tanaka@example.com', 'group_id' => 2, 'grade_id' => 2],
            ['name' => '佐藤次郎', 'email' => 'sato@example.com', 'group_id' => 3, 'grade_id' => 3],
            ['name' => '鈴木一郎', 'email' => 'suzuki@example.com', 'group_id' => 1, 'grade_id' => 2],
            ['name' => '高橋陽子', 'email' => 'takahashi@example.com', 'group_id' => 2, 'grade_id' => 1],
            ['name' => '渡辺健', 'email' => 'watanabe@example.com', 'group_id' => 3, 'grade_id' => 2],
            ['name' => '小林真', 'email' => 'kobayashi@example.com', 'group_id' => 1, 'grade_id' => 3],
            ['name' => '加藤美咲', 'email' => 'kato@example.com', 'group_id' => 2, 'grade_id' => 3],
            ['name' => '伊藤翔', 'email' => 'ito@example.com', 'group_id' => 3, 'grade_id' => 1],
            ['name' => '中村優', 'email' => 'nakamura@example.com', 'group_id' => 2, 'grade_id' => 1],
        ]);
    }
}