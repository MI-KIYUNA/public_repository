<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gym;
use App\Services\DeeplApi\TranslateApiService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TravelPhraseController extends Controller
{
    /**
     * 旅行先で使えるフレーズ一覧 取得 サービス
     */
    protected $translateApiService;

    /**
     * 旅行先で使えるフレーズ一覧 取得 API
     * TODO: エラーハンドリング書く
     * TODO: バリデーション書く
     * TODO: ロジック部分とフォーマット整形関数をサービスクラスを作成して分離する
     *
     * @param Request $request
     * @var string $targetLang 翻訳言語
     * @var array $sentences 翻訳する文章
     * @return Response
     */
    public function index(Request $request)
    {
        $targetLang = $request->input('target_lang');
        if (!$targetLang) {
            return response()->json([]);
        }
        
        $sentences = config('deepl_const.sentences');

        // DeeL翻訳API実行
        $travelPhraseService = new TranslateApiService(
            $sentences,
            $targetLang
        );
        $response = $travelPhraseService->execute();

        $formattedResponse = $this->formatResponse($response);
        return response()->json($formattedResponse);
    }

    private function formatResponse(array $response): array
    {
        $formattedResponse = [];
        foreach ($response['translations'] as $translation) {
            $formattedResponse[] = $translation['text'];
        }
        return $formattedResponse;
    }
}