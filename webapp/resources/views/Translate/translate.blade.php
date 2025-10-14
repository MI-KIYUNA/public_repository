<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        海外旅行で使えるフレーズ集
        @foreach ($popularDestination as $destination)
                {{ $destination }}/
        @endforeach
        で使えるフレーズ集
    </title>
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/common/header_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/travel.css') }}">
</head>
<body>
    @include('Common.header_menu')
    <div class="wrapper">
        <h1>海外旅行で使えるフレーズ集</h1>
 
        <!-- 定番フレーズ フィールド --->
        <div class="useful-sentence-container">
            <h2>定番フレーズ</h2>
            <p>旅行する際に最低限必要な{{$sentences['count']}}個のフレーズをまとめました。<br>
                翻訳したい言語を選択してください。
            </p>
            <select name="targetLangSelect" id="targetLangSelect">
                <option value="">選択してください</option>
                @foreach ($targetLangList as $lang)
                <option value="{{ $lang['code'] }}">{{ $lang['japanese_name'] }}</option>
                @endforeach
            </select>
            
            <table id="phrasesTable">
                <thead>
                    <tr>
                        <th>日本語</th>
                        <th>翻訳した文章</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sentences['list'] as $sentence)
                    <tr>
                        <td>{{ $sentence }}</td>
                        <td class="translated">---</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <!-- カスタム翻訳 フィールド --->
        <div class="custom-translation-container">
            <h2>自由で調べる</h2>
            <div class="inOutput-field">
                <div class="input-area">
                    <h3>翻訳したい文章を入力してください</h3>
                    <div id="custom-translation-input">
                        <input type="text" id="customSentenceInput" placeholder="こんにちは">
                        <button id="translateButton">翻訳する</button>
                    </div>
                </div>
                <div class="output-area">
                    <h3>翻訳結果</h3>
                    <div id="custom-translation-result">
                        <p id="customTranslationResult"></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="other-phrases-container">
            <h2>その他のフレーズ・単語</h2>
                まだまだ知りたい方は、こちらもぜひ、調べてみてください！
                <ul>
                    <li><a href="{{ route('otherSentences') }}">その他のフレーズ一覧へ</a></li>
                    <li><a href="{{ route('usefulWords') }}">よく使う単語一覧へ</a></li>
                </ul>
        </div>
    </div>
  <script>
      window.sentences = @json($sentences['list']);
      window.travelPhraseListApiUrl = "{{ route('travelPhrases.list') }}";
  </script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="{{ asset('js/translate/list.js') }}"></script>
  <script src="{{ asset('js/translate/setup.js') }}"></script>
</body>
</html>