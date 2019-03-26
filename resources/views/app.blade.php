<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ 'css/app.css' }}">
</head>
<body>
<div id="app" class="wrap">
    <router-view></router-view>
</div>
<style>
    .wrap{
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        font-family: 'Hiragino Kaku Gothic Pro','ヒラギノ角ゴ Pro W3','メイリオ',Meiryo,'ＭＳ Ｐゴシック',sans-serif;
    }
</style>
</body>
<script src="{{ 'js/app.js' }}"></script>
</html>
