<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SportGymApiService;
use App\Models\Gym;
use App\Enums\Prefecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class GymController extends Controller
{
    protected $sportGymApiService;

    public function __construct()
    {
        $this->sportGymApiService = new SportGymApiService();
    }

    // 講座一覧取得API
    public function index(Request $request)
    {
        // 検索条件取得
        $stateId = $request->input('state');
            Log::debug('stateId: ' . $stateId);

        // 都道府県名取得
        $stateName = Prefecture::from($stateId)->label();

        // ジムの施設リストを取得
        $gymList = Gym::getGymList();

        //都道府県が選択されている場合は、都道府県で絞り込み
        if (!empty($stateName)) {
            Log::debug('stateName: ' . $stateName);
            $gymList = $this->sportGymApiService->filterGymListByPrefecture(
                $gymList,
                $stateName
            );
        }

        return response()->json($gymList);
    }
}