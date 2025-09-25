<?php

namespace App\Services;

use App\Enums\Prefecture;
use App\Enums\SportsGym\CourseLevels;
use Illuminate\Support\Collection;

/**
 * スポーツ講座サービス
 */
class SportCourseService
{
    /**
     * スポーツジム講座一覧データを整形する
     *
     * @param Collection $courses
     * @return array
     */
    public function formatCourseDataList(
        Collection $courses
    ): array
    {
        $formatedDataList = [];
        foreach ($courses as $course) {
            $formatedDataList[$course->id] = [
                'id' => $course->id,
                'course' => $course->name,
                'level' => $course->level,
                'level_name' => CourseLevels::getCourseLevelNameById($course->level),
                'outline' => $course->outline,
                'gym' => [
                    'id' => $course->gym->id,
                    'name' => $course->gym->name,
                    'state' => $course->gym->state,
                    'city' => $course->gym->city,
                    'street' => $course->gym->street,
                    'other_address' => $course->gym->other_address,
                    'email' => $course->gym->email,
                    'phone_number' => $course->gym->phone_number,
                    'state_id' => Prefecture::getPrefectureIdByName($course->gym->state),
                ],
                'teacher' => [
                    'id' => $course->teacher->id,
                    'name' => $course->teacher->full_name,
                    'email' => $course->teacher->email,
                    'phone_number' => $course->teacher->phone_number,
                ]
            ];
        }
        return $formatedDataList;
    }

    /**
     * スポーツジム施設一覧データを整形する
     *
     * @param Collection $gyms
     * @return array
     */
    public function formatGymDataList(Collection $gyms): array
    {
        $formatedDataList = [];
        foreach ($gyms as $gym) {
            $formatedDataList[$gym->id] = [
                'id' => $gym->id,
                'name' => $gym->name,
                'state_id' => Prefecture::getPrefectureIdByName($gym->state),
            ];
        }
        return $formatedDataList;
    }

    

}