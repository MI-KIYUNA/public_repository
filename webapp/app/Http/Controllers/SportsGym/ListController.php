<?php

namespace App\Http\Controllers\SportsGym;

use App\Enums\Prefecture;
use App\Enums\SportsGym\CourseLevels;
use App\Http\Controllers\Controller;
use App\Models\SportCourse;
use App\Models\Gym;
use App\Services\SportCourseService;
use Illuminate\Http\Response;

class ListController extends Controller
{
    /**
     * スポーツ講座サービス
     */
    protected $sportCourseService;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->sportCourseService = new SportCourseService();
    }

    /**
     * スポーツジム 講座一覧 画面表示
     *  ~ JavaScriptでオフライン検索するver ~
     *
     * @return Response
     */
    public function index()
    {
        // スポーツジム講座一覧を取得
        $courses = SportCourse::getSportCourseList();
        $courses = $this->sportCourseService->formatCourseDataList($courses);

        // 都道府県の一覧を取得
        $prefectures = Prefecture::getPrefectureList();

        // 講座レベル一覧を取得
        $courseLevels = CourseLevels::getCourseLevelList();

        // 施設名一覧を取得
        $gymList = Gym::getGymList();
        $gymList = $this->sportCourseService->formatGymDataList(
            $gymList,
        );

        return view('Course.list', compact(
            'courses',
            'prefectures',
            'courseLevels',
            'gymList'
        ));
    }
}

