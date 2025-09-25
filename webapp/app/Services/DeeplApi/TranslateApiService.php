<?php

namespace App\Services\DeeplApi;

class TranslateApiService extends DeeplBaseService
{

    protected array $sentences;
    protected string $targetLang;

    /**
     * コンストラクタ
     * @param array $sentences 翻訳する文章
     * @param string $targetLang 翻訳先の言語
     */
    public function __construct(
        array $sentences,
        string $targetLang
    ){
        $this->sentences = $sentences;
        $this->targetLang = $targetLang;
    }
    protected function getMethod(): string
    {
        return 'POST';
    }

    protected function getUrl(): string
    {
        return config('deepl.api_url') . '/translate';
    }

    protected function getHeaders(): array
    {
        return [
            'headers' => [
                'Authorization' => 'DeepL-Auth-Key ' . config('deepl.api_key'),
                'Content-Type' => 'application/json',
            ]
        ];
    }

    protected function getRequestParams(): array
    {
        return [
            'json' => [
                'text' => $this->sentences,
                'target_lang' => $this->targetLang,
            ]
        ];
    }

    protected function getApiName(): string
    {
        return 'Translate API';
    }

}
