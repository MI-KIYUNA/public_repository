<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SportCoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sport_courses')->insert([
            [
                'name' => 'ヨガ基礎',
                'gym_id' => 1,
                'teacher_id' => 1,
                'outline' => '初心者向けのヨガクラスです。呼吸法や基本ポーズを学びます。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '筋力トレーニング',
                'gym_id' => 1,
                'teacher_id' => 2,
                'outline' => '全身の筋力を鍛えるトレーニング講座です。器具の使い方も説明します。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'エアロビクス',
                'gym_id' => 2,
                'teacher_id' => 3,
                'outline' => '音楽に合わせて楽しく運動できるエアロビクスのクラスです。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}