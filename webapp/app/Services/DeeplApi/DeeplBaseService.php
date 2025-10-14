<?php

namespace App\Services\DeeplApi;

use Illuminate\Support\Facades\Log;
use GuzzleHttp\Client;

abstract class DeeplBaseService
{

    /**
     * Httpメソッドを取得
     * @return string
     */
    abstract protected function getMethod(): string;

    /**
     * urlを取得
     * @return string
     */
    abstract protected function getUrl(): string;

    /**
     * ヘッダーパラメータ取得
     * @return array
     */
    abstract protected function getHeaders(): array;

    /**
     * リクエストパラメータを取得
     * @return array
     */
    abstract protected function getRequestParams(): array;

    /**
     * API名を取得
     * @return string
     */
    abstract protected function getApiName(): string;

    /**
     * DeepL APIを実行
     * @param array $sentences
     * @param string $targetLang
     */
    function execute(){
        $client = new Client();
        $method = $this->getMethod();
        $url = $this->getUrl();
        $apiName = $this->getApiName();

        // headersとrequestParamsをマージする
        $options = array_merge(
            $this->getHeaders(),
            $this->getRequestParams()
        );

        // リクエストログ
        Log::info($apiName . 'リクエスト', [
            'url' => $url,
            'method' => $method,
            'options' => $options,
        ]);

        // 実行
        $response = $client->request(
            $method,
            $url,
            $options
        );

        // レスポンスログ
        Log::info($apiName . 'レスポンス', [
            'responseBody' => $response->getBody()
        ]);

        return json_decode($response->getBody(), true);
    }

}
