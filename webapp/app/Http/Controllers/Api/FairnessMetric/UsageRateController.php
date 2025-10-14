<?php

namespace App\Http\Controllers\Api\FairnessMetric;

use App\Http\Controllers\Controller;
use App\Services\Fairness\UsageRateMetric;

class UsageRateController extends Controller
{
    /**
     * 利用率メトリック API
     */
    public function evaluate()
    {
        $UsageRateMetric = new UsageRateMetric();
        return response()->json($UsageRateMetric->evaluate());
    }
}