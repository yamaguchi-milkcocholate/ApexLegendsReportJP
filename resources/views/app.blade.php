<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ 'css/app.css' }}">
    <link rel="stylesheet" href="{{ 'css/main.css' }}">
</head>
<body>
<div id="app" class="wrap">
    <div class="header">
        <div>main</div>
    </div>
    <div class="contents">
        <router-view></router-view>
    </div>
    <div class="footer">
    </div>
</div>
</body>
<script src="{{ 'js/app.js' }}"></script>
</html>
