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
            <x-slot name="header">
            <h2>在庫一覧</h2>
            </x-slot>
                    <h3>ユーザー：{{ Auth::user()->name }}</h3>
                    <div class="form-about">
                        <form action="{{ route('index') }}" method="GET">
                            @csrf
                            <input type="text" name="keyword" value="{{ $keyword }}" placeholder="すべての商品から探す">
                            <img class="placeholder_img" src="https://sato-icons.com/wp/wp-content/uploads/2020/09/%E6%A4%9C%E7%B4%A2%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B3.png" alt="検索アイコン">
                        </form>
                    </div>
            <table>
                <div class='products'>
                    <tr>
                        <th>商品コード</th>
                        <th>カテゴリー</th>
                        <th>商品名</th>
                        <th>単価</th>
                        <th>発注数</th>
                        <th>登録日</th>
                        <th>編集</th>]
                        <th>削除</th></th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <div class='product'>
                                <td class="product_code">{{ $product->product_code }}</td>
                                <td class="category_id">
                                    <a href="">{{ $product->category->name }}</a></td>
                                <td class="name">{{ $product->name }}</td>
                                <td class="unit_price">{{ $product->unit_price }}</td>
                                <td class="quantity">{{ $product->quantity }}</td>
                                <td class="created_at">{{ $product->created_at->format('Y/m/d') }}</td>
                                <td class="edit_link">
                                    <a href="/products/{{ $product->id }}">編集</a></td>
                                <td class="delete_button">
                                    <form action="/products/{{ $product->id }}" id="form_{{ $product->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deleteProduct({{ $product->id }})">削除</button>
                                    </form>
                                </td>
                            </div>
                        </tr>
                    @endforeach
                </div>
            </table>
            <div class='paginate'>
                {{ $products->links() }}
            </div>
            <div class='edit_create'>
                <!--<a href='/products/edit' class="btn--edit">在庫編集</a>-->
                <a href='/products/create' class="btn--create">新規登録</a>
            </div>
        </x-app-layout>
        <script>
            function deleteProduct(id){
            'use strict'
            
            if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>