<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SportsGym\ListController as SportsGymListController
};

Route::get('/', function () {
    return view('welcome');
});

Route::get('/check', function () {
    return view('check');
});

/**----------------------
 * スポーツジム SportsGym
 -----------------------*/

// 講座一覧 ~ JavaScriptでオフライン検索するver ~
Route::get('/course/list', [SportsGymListController::class, 'index']);

// 講座一覧 ~ ajax処理で検索するver ~
Route::get('/course/list/ajax', function () {
    return view('Course.list2');
});
// 講座詳細
// 講座申し込み POST
// 完了ページ
