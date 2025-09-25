<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    GymCourseController,
    GymController,
    LevelController,
    PrefectureController
};

Route::get('/courses', [GymCourseController::class, 'index'])->name('sportGym.courses');
Route::get('/gyms', [GymController::class, 'index'])->name('sportGym.gyms');
Route::get('/levels', [LevelController::class, 'index'])->name('sportGym.levels');
Route::get('/prefectures', [PrefectureController::class, 'index'])->name('prefectures');