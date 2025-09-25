<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

/**
 * スポーツジム施設サービス
 */
class SportGymApiService
{
    /**
     * スポーツジム施設を都道府県で絞り込み
     *
     * @param Collection $gymList
     * @param string $stateName
     * @return array
     */
    public function filterGymListByPrefecture(
        Collection $gymList,
        string $stateName,
    ): array
    {

        $filteredGymList = [];
        foreach ($gymList as $key => $gym) {
            if ($gym->state === $stateName) {
                $filteredGymList[$key] = $gym;
                Log::debug('filterGymListByPrefecture()', [
                    'stateName' => $stateName,
                    'state' => $gym->state,
                ]);
            }
        }
        return $filteredGymList;
    }
}