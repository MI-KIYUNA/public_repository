<?php

namespace App\Services;

use App\Enums\Prefecture;
use Illuminate\Support\Collection;

/**
 * 都道府県サービス
 */
class PrefectureApiService
{
    /**
     * 都道府県一覧データを整形する
     *
     * @param ?int $prefectureId
     * @return array
     */
    public function getPrefectureList(
        ?int $prefectureId,
    ): array
    {
        $prefectureList = Prefecture::getPrefectureList();
        return $this->formatPrefectureList($prefectureList);
    }

    private function formatPrefectureList(array $prefectureList): array
    {
        $formatPrefectureList = [];
        foreach ($prefectureList as $prefecture) {
            $formatPrefectureList[$prefecture['id']] = [
                'name' => $prefecture['name'],
            ];
        }
        return $formatPrefectureList;
    }


}