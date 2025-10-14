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
        $sentences['list'] = config('deepl_const.sentences') ?? [];
        $sentences['count'] = count($sentences['list']) ?? 0;
        $targetLangList = config('deepl_const.target_lang_list');
        $popularDestination = config('deepl_const.popular_destination');
        return view('Translate.translate', compact(
            'sentences',
            'targetLangList',
            'popularDestination'
        ));
    }

    /**
     * その他のフレーズ一覧 画面表示
     *
     * @param array $otherSentences その他のフレーズ一覧
     * @return Response
     */
    public function otherSentences()
    {
        $otherSentences = config('deepl_const.other_sentences');
        $popularDestination = config('deepl_const.popular_destination');

        return view('Translate.otherSentences', compact(
            'otherSentences',
            'popularDestination'
        ));
    }

    public function usefulWords()
    {
        $recomendWords = config('deepl_const.recomend_words');
        $popularDestination = config('deepl_const.popular_destination');

        return view('Translate.usefulWords', compact(
            'recomendWords',
            'popularDestination'
        ));
    }
}

