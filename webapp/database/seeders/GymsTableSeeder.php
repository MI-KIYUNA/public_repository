<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gyms')->insert([
            [
                'name'           => '沖縄フィットネス',
                'state'          => '沖縄県',
                'city'           => '那覇市',
                'street'         => '久茂地1-1-1',
                'other_address'  => 'サンライズビル3F',
                'email'          => 'okinawa-fitness@example.com',
                'phone_number'   => '098-123-4567',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => '東京スポーツクラブ',
                'state'          => '東京都',
                'city'           => '渋谷区',
                'street'         => '道玄坂2-2-2',
                'other_address'  => '渋谷タワー5F',
                'email'          => 'tokyo-sports@example.com',
                'phone_number'   => '03-9876-5432',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'name'           => '大阪ジム',
                'state'          => '大阪府',
                'city'           => '大阪市',
                'street'         => '梅田3-3-3',
                'other_address'  => 'グランドビル10F',
                'email'          => 'osaka-gym@example.com',
                'phone_number'   => '06-1122-3344',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}