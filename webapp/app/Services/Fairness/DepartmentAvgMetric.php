<?php

namespace App\Services\Fairness;

use App\Models\Group;
use Illuminate\Support\Facades\DB;

class DepartmentAvgMetric implements FairnessMetricInterface
{
    public function evaluate(): array
    {
        // 各部署ごとに社員の購入履歴を集計
        $departments = Group::with(['employees.purchases'])->get();
        $results = [];
        dd($departments);
        foreach ($departments as $group) {
            $total = 0;
            $count = 0;
            foreach ($group->employees as $employee) {
                $amount = $employee->purchases->sum('amount');
                $total += $amount;
                $count++;
            }
            $avg = $count > 0 ? $total / $count : 0;
            $results[] = [
                'group_id' => $group->id,
                'group_name' => $group->name,
                'employee_count' => $count,
                'total_amount' => $total,
                'average_amount' => $avg,
            ];
        }

        // 部署ごとの平均購入金額一覧
        $avgs = array_column($results, 'average_amount');
        $stddev = $this->standardDeviation($avgs);

        return [
            'departments' => $results,
            'stddev' => $stddev,
            'max' => count($avgs) ? max($avgs) : 0,
            'min' => count($avgs) ? min($avgs) : 0,
        ];
    }

    private function standardDeviation($array): float
    {
        $n = count($array);
        if ($n === 0) return 0;
        $mean = array_sum($array) / $n;
        $variance = array_reduce($array, fn($carry, $item) => $carry + pow($item - $mean, 2), 0) / $n;
        return sqrt($variance);
    }
}