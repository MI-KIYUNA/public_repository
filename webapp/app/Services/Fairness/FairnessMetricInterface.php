<?php

namespace App\Services\Fairness;

/** 
 * 公平性評価メトリック インターフェース
 */
interface FairnessMetricInterface
{
    public function evaluate(): array;
}