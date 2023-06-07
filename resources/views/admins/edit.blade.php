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
            <h2>在庫編集画面</h2>
                <h3>ユーザー：{{ Auth::user()->name }}</h3>
                <form action="/products/{{ $product->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p class="content_product_code">
                        <label>商品コード</label>
                        <input type="number" name="product[product_code]" value="{{ $product->product_code }}"/>
                    </p>
                    <p class="content_category">
                        <a href="/categories/{{ $product->category->id }}">{{ $product->category->name }}</a>
                    </p>
                    <p class="content_product">{{ $product->name }}</p>
                    <p class='content_unit_price'>
                        <label>単価</label>
                        <input type="number" name="product[unit_price]" value="{{ $product->unit_price }}"/>
                    </p>
                    <p class='contetnt_quantity'>
                        <label>発注数</label>
                        <input type="number" name="product[quantity]" value="{{ $product->quantity }}"/>
                    </p>
                    <p class="content_created_at">{{ $product->created_at->format('Y/m/d') }}</p>
                    <input type="submit" value="変更">
                </form>
        <button>
            <a href="/" class="back">戻る</a>
        </button>
    </body>
</html>
