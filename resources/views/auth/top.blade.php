<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('/css/top.css') }}">
        <title>在庫管理アプリ</title>
    </head>
    <body>
        <div class="container">
            <div class="title">
                <h1>在庫管理アプリ</h1>
            </div>
            <div class="cube">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div class="start">
                <div class="btn">
                    <a href="/login">Log In</a>
                </div>
                <div class="btn">
                    <a href="/register">Sign Up</a>
                </div>
            </div>
            
        </div>
    </body>
</html>