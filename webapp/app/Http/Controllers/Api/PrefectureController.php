<?php

namespace App\Http\Controllers\Api;

use App\Enums\Prefecture;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PrefectureController extends Controller
{
    // 講座一覧取得API
    public function index(Request $request)
    {
        // 検索条件取得
        $stateName = $request->input('state');

        // 都道府県一覧取得
        $prefectureArray = Prefecture::getPrefectureList();

        if ($stateName) {
            $stateId = Prefecture::getPrefectureIdByName($stateName) ?? "";
            $prefectureArray = [$prefectureArray[$stateId] ?? []];
        }

        return response()->json($prefectureArray);
    }
}