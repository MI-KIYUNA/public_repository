<?php

namespace App\Http\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gym;
use App\Services\DeeplApi\TranslateApiService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TravelPhraseController extends Controller
{
    /**
     * 旅行先で使えるフレーズ一覧 取得 サービス
     */
    protected $translateApiService;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->translateApiService = new TranslateApiService();
    }

    /**
     * 旅行先で使えるフレーズ一覧 取得 API
     * @return Response
     */
    public function index(Request $request)
    {
        // 翻訳する文章と翻訳先言語
        $targetLang = $request->input('target_lang') ?? 'EN';
        $sentences = config('deepl_const.sentences');

        // DeeL翻訳API実行
        $travelPhraseService = new TranslateApiService(
            $sentences,
            $targetLang
        );
        $response = $travelPhraseService->translate();

        return $response->json('translations');
    }
}