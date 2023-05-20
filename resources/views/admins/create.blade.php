<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>在庫管理システム</title>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                新規登録
            </x-slot>
        <form action="/admins" method="POST">
            @csrf
            <div class="category_id">
                <p>カテゴリーID
                <input type="number" name="product[category_id]"/></p>
            </div>
            <div class="name">
                <p>商品名
                <input type="text" name="product[name]"/></p>
            </div>
            <div class="quantity">
                <p>在庫数
                <input type="number" name="product[quantity]"/></p>
            </div>
            <div class="user">
                <p>登録者ID
                <input type="number" name="product[user_id]"></p>
            </div>
            <input type="submit" value="登録"/>
        </form>   
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        </x-app-layout>
    </body>
    </html>