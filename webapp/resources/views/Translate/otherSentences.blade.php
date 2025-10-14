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
        <h1>海外旅行で使えるフレーズ集 ~ +α編 ~</h1>

        <!-- その他のフレーズ フィールド --->
        <div class="other-phrases-container">
            <h2>その他のフレーズ一覧</h2>
            <p>こちらもぜひ、調べてみてください！</p>
            <ul>
            @foreach ($otherSentences as $sentence)
                <li>{{ $sentence }}</li>
            @endforeach
            </ul>
        </div>
    </div>
</body>
</html>