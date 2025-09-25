<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // 追加：ジム・講師・コースのシーダー呼び出し
        $this->call([
            GymsTableSeeder::class,
            TeachersTableSeeder::class,
            SportCoursesTableSeeder::class,
        ]);
    }
}