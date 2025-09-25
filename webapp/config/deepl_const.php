<?php

return [
    // 翻訳するフレーズ
    'sentences' => [
        "こんにちは",
        "お元気ですか？",
        "今日はいい天気ですね。",
        "ご飯を食べましたか？",
        "仕事は順調ですか？",
        "趣味は何ですか？",
        "旅行が好きですか？",
        "家族は元気ですか？",
        "最近何か面白いことありましたか？",
        "また会いましょう。"
    ],

    // Translate API
    'Translate_API' => [
        'url' => 'https://api-free.deepl.com/v2/translate',
        'auth_key' => env('DEEPL_AUTH_KEY'),
        'source_lang' => 'JA'
    ],
];