<?php

namespace App\Services;

use App\Enums\SportsGym\CourseLevels;
use App\Models\SportCourse;
use Illuminate\Support\Collection;

/**
 * スポーツ講座サービス
 */
class SportCourseApiService
{
    /**
     * スポーツジム講座一覧データを取得する
     *
     * @param ?string $state
     * @param ?int $gymId
     * @param ?int $levelId
     * @return array
     */
    public function getCourses(
        ?string $stateName,
        ?int $gymId,
        ?int $levelId
    ): array
    {
        $courses = SportCourse::getSportCourseListByFilter(
            $stateName,
            $gymId,
            $levelId
        );
        return $this->formatCourseDataList($courses);
    }

    /**
     * 講座一覧データを整形する
     *
     * @param Collection $courses
     * @return array
     */
    private function formatCourseDataList(Collection $courses): array
    {
        $formattedCourseDataList = [];
        foreach ($courses as $course) {
            $formattedCourseDataList[$course->id] = [
                'name' => $course->name,
                'level' => CourseLevels::from($course->level)->label(),
                'outline' => $course->outline,
                'gym_name' => $course->gym_name,
                'teacher_name' => $course->teacher_first_name . ' ' . $course->teacher_last_name,            ];
        }
        return $formattedCourseDataList;
    }
}