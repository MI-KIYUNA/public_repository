<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SportCourseApiService;
use App\Models\SportCourse;
use App\Enums\Prefecture;
use Illuminate\Http\Request;


class GymCourseController extends Controller
{
    protected $sportCourseApiService;

    public function __construct()
    {
        $this->sportCourseApiService = new SportCourseApiService();
    }

    // 講座一覧取得API
    public function index(Request $request)
    {
        // 検索条件取得
        $stateId = $request->input('state');
        $gymId = $request->input('gym_id');
        $levelId = $request->input('level_id');

        // 都道府県名取得
        $stateName = Prefecture::from($stateId)->label();

        // 講座一覧取得
        $courseList = $this->sportCourseApiService->getCourses(
            $stateName,
            $gymId,
            $levelId
        );

        return response()->json($courseList);
    }
}