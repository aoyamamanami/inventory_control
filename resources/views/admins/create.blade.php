<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{asset('/assets/css/app.css')}}">
        <title>在庫管理システム</title>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                新規登録
            </x-slot>
            <form action="/products" method="POST">
                @csrf
                <table>
                <div class="category_id">
                    <td>カテゴリー
                        <select name="product[category_id]">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </div>
                <div class="product_code">
                    <td>商品コード
                    <input type="number" name="product[product_code]"/></td>
                </div>
                <div class="name">
                    <td>商品名
                    <input type="text" name="product[name]"/></td>
                        @error('product.name')
                        <p>{{ $message }}</p>
                        @enderror
                </div>
                <div class="unit_price">
                    <td>単価
                    <input type="number" name="product[unit_price]"/>円</td>
                </div>
                <div class="quantity">
                    <td>発注数
                    <input type="number" name="product[quantity]"/></td>
                </div>
                </table>
                    <input type="submit" class="submit" value="登録"/>
            </form>   
        <button>
            <a href="/" class="back">戻る</a>
        </button>
        </x-app-layout>
    </body>
</html>