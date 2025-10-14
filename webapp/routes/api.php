<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    GymCourseController,
    GymController,
    LevelController,
    PrefectureController,
    TravelPhraseController,
    FairnessMetric\UsageRateController as UsageRateController,
    FairnessMetric\GiniController as GiniController
};

// スポーツジム 関連
Route::get('/courses', [GymCourseController::class, 'index'])->name('sportGym.courses');
Route::get('/gyms', [GymController::class, 'index'])->name('sportGym.gyms');
Route::get('/levels', [LevelController::class, 'index'])->name('sportGym.levels');
Route::get('/prefectures', [PrefectureController::class, 'index'])->name('prefectures');

// DeepL 旅行で使えるフレーズ
Route::get('/travel_phrases', [TravelPhraseController::class, 'index'])->name('travelPhrases.list');

// 公平性評価指標
Route::get('/fairness/usage_rate', [UsageRateController::class, 'evaluate'])->name('fairness.usage_rate');
Route::get('/fairness/gini/all', [GiniController::class, 'evaluateAllMembers'])->name('fairness.gini.all');
// TODO: 部署ごとの四分位偏差取得 API 作成する(部署間に不公平性はないか)
// TODO: 部署内での四分位偏差取得 API 作成する(部署内に不公平性はないか)
// TODO: うまく運用できていない部署の抽出
// TODO: うまく運用できていない人の抽出