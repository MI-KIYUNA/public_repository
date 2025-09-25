<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SportGymApiService;
use App\Models\Gym;
use App\Enums\SportsGym\CourseLevels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class LevelController extends Controller
{
    // 講座レベル一覧取得API
    public function index()
    {
        $gymList = CourseLevels::getCourseLevelList();
        return response()->json($gymList);
    }
}