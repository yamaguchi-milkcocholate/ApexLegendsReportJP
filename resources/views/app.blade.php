<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- description -->
    <meta name="description" content="Apex Legendsからチーターを一掃しよう。かんたんにEasy Anti-Cheatに報告できます!!">
    <!-- translate -->
    <meta name="google" content="notranslate" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">

    <title>ApexLegendsReportJP</title>

    <link rel="stylesheet" href="{{ 'css/app.css' }}">
    <style>
        body *
        {
            font-family: "游教科書体 横用","YuKyokasho Yoko";
        }
        .wrap{
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Hiragino Kaku Gothic Pro','ヒラギノ角ゴ Pro W3','メイリオ',Meiryo,'ＭＳ Ｐゴシック',sans-serif;
        }
        .eye-catch
        {
            position: absolute;
            top: 50px;
            z-index: 99;
            width: 100%;
            height: 400px;
            background: #FFF url('images/eye-catch-edit.jpg') no-repeat center top scroll;
        }
        .header
        {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 50px;
            color: white;
            background: #191919;
            z-index: 100;
            display: flex;
            justify-content: center;
        }
        .header-left
        {
            width: 20%;
            display: flex;
            justify-content: flex-start;
        }
        .header-center
        {
            width: 60%;
            display: flex;
            justify-content: center;
        }
        .header-right
        {
            width: 20%;
            display: flex;
            justify-content: flex-end;
        }
        .contents
        {
            position: absolute;
            top: 450px;
            height: 1000px;
            width: 100%;
            flex: 1;
            bottom: 50px;
        }
        .footer
        {
            position: fixed;
            bottom: 0px;
            left: 0px;
            width: 100%;
            height: 25px;
            color: white;
            background: #191919;
            z-index: 100;
        }
        .app-name {
            margin: auto 10px;
        }
        .app-name a
        {
            font-weight: bold;
            color: white;
            text-decoration: none;
        }
        .content
        {
            width: 100%;
            background: #F9F9F9;
        }
        .report-nav
        {
            justify-content: center;
            background: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .report-nav-el
        {
            color: black;
            font-weight: bold;
            width: 250px;
            text-align: center;
        }
        .report-nav-el-active
        {
            color: #0257FF;
        }
    </style>
</head>
<body>
<div id="app" class="wrap">
    <div class="eye-catch"
         style=""
    >
    </div>
    <router-view></router-view>
</div>
</body>
<script src="{{ 'js/app.js' }}"></script>
</html>
