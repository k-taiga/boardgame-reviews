<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@koba_onrails" />
    <meta property="og:url" content="https://bodoge-cafe-reviews.work" />
    <meta property="og:title" content="ボードゲームカフェのレビューができるサイトをローンチしました！" />
    <meta property="og:description" content="都内のボードゲームカフェの検索とレビューができるサイトです！" />
    <meta property="og:image" content="s3の画像を入れる" />
    <title>{{ config('app.name') }} | ボードゲームカフェのレビューサイト</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- googlefonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather|Roboto:400">
    <!-- webアイコンフォント -->
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css">
    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ mix('/css/app.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

</head>

<body>
    <div id="app"></div>
</body>

<!-- font awesome -->
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.js"></script>

</html>
