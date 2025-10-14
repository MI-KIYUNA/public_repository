<?php

namespace App\Services\Fairness;

use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class GiniMetricAllMembers implements FairnessMetricInterface
{
    public function evaluate(): array
    {
        // 従業員ごとの合計購入金額
        $purchases = Purchase::select('employee_id')
                        ->selectRaw('SUM(amount) as total_amount')
                        ->groupBy('employee_id')
                        ->pluck('total_amount')
                        ->toArray();
        // ジニ係数の計算
        $giniIndex = (new GiniMetric())->evaluateGiniIndex($purchases);

        return [
            'all_members_gini_index' => $giniIndex,
        ];
    }
}