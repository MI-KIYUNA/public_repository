<?php

namespace App\Services\Fairness;

use App\Models\Purchase;
use Illuminate\Support\Facades\DB;

class GiniMetric
{
    /**
     * ジニ係数の算出
     * @param array $values 1次元配列の数値データ
     * @return float ジニ係数 (0〜1の範囲) 0に近いほど平等、1に近いほど不平等
     */
    public function evaluateGiniIndex(array $values): float
    {
        $n = count($values);
        if ($n === 0) return 0;
        $mean = array_sum($values) / $n;
        $sum = 0;

        // 全てのデータのペアについて差の絶対値の総和を計算
        foreach ($values as $i) {
            foreach ($values as $j) {
                $sum += abs($i - $j);
            }
        }

        // ジニ係数の公式で計算
        return $mean == 0 ? 0 : $sum / (2 * $n * $n * $mean);
    }
}