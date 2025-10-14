<?php

namespace App\Services\Fairness;

use App\Models\Employee;
use App\Models\Purchase;

/** 
 * 利用率メトリック
 * 従業員の中でサービスを利用した人の割合を計算します。
 * 
 * @return array 
 */
class UsageRateMetric implements FairnessMetricInterface
{
    public function evaluate(): array
    {
        $total = Employee::count();
        $used = Purchase::distinct('employee_id')->count('employee_id');
        $unused = $this->getUnusedEmployees()->toArray();

        return [
            'total_employees' => $total,
            'used_employees' => $used,
            'usage_rate' => $total > 0 ? round($used / $total * 100, 2) : 0,
            'unused_employees' => $unused,
        ];
    }

    private function getUnusedEmployees()
    {
        return Employee::whereDoesntHave('purchases')
                    ->with(['group', 'grade'])
                    ->get()
                    ->map(function($employee){
                        return [
                            'id' => $employee->id,
                            'name' => $employee->name,
                            'email' => $employee->email,
                            'group' => $employee->group ? $employee->group->name : null,
                            'grade' => $employee->grade ? $employee->grade->name : null,
                        ];
                    });
    }
}