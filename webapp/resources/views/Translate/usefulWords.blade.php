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
        <h1>海外旅行でよく使う単語</h1>

        <!-- よく使う単語 フィールド --->
        <div class="frequently-used-words-container">
            <h2>よく使う単語</h2>
            <ul>
            @foreach ($recomendWords as $word)
                    <li>{{ $word }}</li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>