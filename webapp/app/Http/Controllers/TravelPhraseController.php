<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gym;
use App\Services\TravelPhraseService;
use Illuminate\Http\Response;

class TravelPhraseController extends Controller
{
    /**
     * 旅行先で使えるフレーズ一覧 画面表示
     *
     * @param array $sentences 翻訳する文章
     * @return Response
     */
    public function index()
    {
        $sentences = config('deepl_const.sentences');
        return view('translate', compact('sentences'));
    }
}

