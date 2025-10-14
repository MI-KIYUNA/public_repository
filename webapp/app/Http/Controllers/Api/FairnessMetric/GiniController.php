<?php

namespace App\Http\Controllers\Api\FairnessMetric;

use App\Http\Controllers\Controller;
use App\Services\Fairness\GiniMetricAllMembers;

class GiniController extends Controller
{
    /**
     * 全従業員のジニ係数 メトリック API
     */
    public function evaluateAllMembers()
    {
        $GiniMetricAllMembers = new GiniMetricAllMembers();
        return response()->json($GiniMetricAllMembers->evaluate());
    }
}