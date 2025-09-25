<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            [
                'first_name'   => 'Taro',
                'last_name'    => 'Yamada',
                'email'        => 'taro.yamada@example.com',
                'phone_number' => '080-1111-2222',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'first_name'   => 'Hanako',
                'last_name'    => 'Suzuki',
                'email'        => 'hanako.suzuki@example.com',
                'phone_number' => '080-3333-4444',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'first_name'   => 'John',
                'last_name'    => 'Smith',
                'email'        => 'john.smith@example.com',
                'phone_number' => '080-5555-6666',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);
    }
}