<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PurchaseSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();
        DB::table('purchases')->insert([
            ['shop_id' => 1, 'employee_id' => 1, 'purchase_time' => $now->subDays(1), 'amount' => 1200.50],
            ['shop_id' => 2, 'employee_id' => 2, 'purchase_time' => $now->subDays(2), 'amount' => 800.00],
            ['shop_id' => 3, 'employee_id' => 3, 'purchase_time' => $now->subDays(3), 'amount' => 500.00],
            ['shop_id' => 1, 'employee_id' => 4, 'purchase_time' => $now->subDays(1), 'amount' => 1000.00],
            ['shop_id' => 2, 'employee_id' => 5, 'purchase_time' => $now->subDays(2), 'amount' => 750.00],
            ['shop_id' => 3, 'employee_id' => 6, 'purchase_time' => $now->subDays(3), 'amount' => 900.00],
            ['shop_id' => 1, 'employee_id' => 7, 'purchase_time' => $now->subDays(1), 'amount' => 1100.00],
            ['shop_id' => 2, 'employee_id' => 8, 'purchase_time' => $now->subDays(2), 'amount' => 950.00],
            ['shop_id' => 3, 'employee_id' => 9, 'purchase_time' => $now->subDays(3), 'amount' => 600.00],
            ['shop_id' => 1, 'employee_id' => 10, 'purchase_time' => $now->subDays(1), 'amount' => 700.00],
            ['shop_id' => 2, 'employee_id' => 1, 'purchase_time' => $now->subDays(4), 'amount' => 1300.00],
            ['shop_id' => 3, 'employee_id' => 2, 'purchase_time' => $now->subDays(5), 'amount' => 900.00],
            ['shop_id' => 1, 'employee_id' => 3, 'purchase_time' => $now->subDays(6), 'amount' => 1200.00],
            ['shop_id' => 2, 'employee_id' => 4, 'purchase_time' => $now->subDays(7), 'amount' => 800.00],
            ['shop_id' => 3, 'employee_id' => 5, 'purchase_time' => $now->subDays(8), 'amount' => 900.00],
            ['shop_id' => 1, 'employee_id' => 6, 'purchase_time' => $now->subDays(9), 'amount' => 1000.00],
            ['shop_id' => 2, 'employee_id' => 7, 'purchase_time' => $now->subDays(10), 'amount' => 1100.00],
            ['shop_id' => 3, 'employee_id' => 8, 'purchase_time' => $now->subDays(11), 'amount' => 950.00],
            ['shop_id' => 1, 'employee_id' => 9, 'purchase_time' => $now->subDays(12), 'amount' => 600.00],
            ['shop_id' => 2, 'employee_id' => 10, 'purchase_time' => $now->subDays(13), 'amount' => 700.00],
        ]);
    }
}