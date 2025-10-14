<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    SportsGym\ListController as SportsGymListController,
    TravelPhraseController 
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

// TODO: 以下、未実装
// 講座詳細
// 講座申し込み POST
// 完了ページ

/**-------------------------
 * DeepL 旅行で使えるフレーズ
 -------------------------*/
Route::get('travel_phrases', [TravelPhraseController::class, 'index']);
Route::get('other_sentences', [TravelPhraseController::class, 'otherSentences'])->name('otherSentences');
Route::get('useful_words', [TravelPhraseController::class, 'usefulWords'])->name('usefulWords');


/**-------------------------
 * 購入システムの利用状況評価
 -------------------------*/
