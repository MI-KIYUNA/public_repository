<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;


    /**
     * グループのリレーション
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    /**
     * グレードのリレーション
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    /**
     * 購入履歴のリレーション
     */
    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }
}
