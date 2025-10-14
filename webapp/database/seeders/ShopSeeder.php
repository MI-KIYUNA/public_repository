<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    public function run()
    {
        DB::table('shops')->insert([
            ['name' => 'コンビニ'],
            ['name' => 'スーパー'],
            ['name' => 'ドラッグストア'],
        ]);
    }
}