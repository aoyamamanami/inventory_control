<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
    <body>
        <x-app-layout>
            <x-slot name="head">
                <link rel="stylesheet" href="{{asset('/assets/css/index.css')}}">    
            </x-slot>
            <x-slot name="header">
                <h2>カテゴリ編集</h2>
            </x-slot>
                    <h3>ユーザー：{{ Auth::user()->name }}</h3>
                    <div class="form-list">
                        <form actiom="/categories" method="POST">
                            @csrf
                            <div class="input-row category-name">
                                <input type="text" name="category[name]" value>
                            </div>
                            <div class="submit-btn">
                                <input type="submit" value="登録"/>
                            </div>
                        </form>
                    </div>
            <div class="back-btn">
                <a href="/">一覧に戻る</a>
            </div>
        </x-app-layout>
    </body>
</html>