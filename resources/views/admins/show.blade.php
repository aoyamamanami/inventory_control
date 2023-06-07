<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>在庫管理システム</title>
        <!--Fonts-->
        <link rel="stylesheet" href="{{asset('/assets/css/app.css')}}">
        <link href="https://fonts/googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <x-app-layout>
            <x-slot name='header'>
                <h2>在庫詳細画面</h2>
            </x-slot>
                <h3>ユーザー：{{ Auth::user()->name }}</h3>
                <div class='content_product'>
                    <p class="content_id">{{ $product->id }}</p>
                    <p class="content_category">
                        <a href="">{{ $product->category->name }}</a>
                    </p>
                    <p class="content_product">{{ $product->name }}</p>
                    <p class='content_unit_price'>{{ $product->unit_price }}</p>
                    <p class='contetnt_quantity'>{{ $product->quantity }}</p>
                    <p class="content_created_at">{{ $product->created_at }}</p>
                    <p class="content_user_id">{{ $product->user_id }}</p>
                </div>
            <div class='back'>
                <a href="/">戻る</a>
            </div>
        </x-app-layout>
    </body>