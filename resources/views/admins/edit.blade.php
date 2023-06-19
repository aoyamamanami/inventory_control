<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
    <body>
        <x-app-layout>
            <x-slot name="head">
                <link rel="stylesheet" href="{{asset('/assets/css/edit.css')}}">   
            </x-slot>
            <x-slot name="header">
                <h2>在庫編集画面</h2>
            </x-slot>
                <h3 class="edit-user">ユーザー：{{ Auth::user()->name }}</h3>
                    <div class="edit-container">
                        <form action="/products/{{ $product->id }}" method="POST" id="updateForm">
                            @csrf
                            @method('PUT')
                            <div class="content-category">
                                <h1 href="/categories/{{ $product->category->id }}">{{ $product->category->name }}</h1>
                            </div>
                            <div class="content product_code">
                                <h1>{{ $product->product_code }}</h1> 
                            </div>
                            <div class="content company">
                                <h1>{{ $product->company }}</h1>
                            </div>
                            <div class="content product">
                                <h1>{{ $product->name }}</h1>
                            </div>
                            <div class="content-unit_price">
                                <lavel>単価</lavel>
                                <input type="number" name="product[unit_price]" placeholder="{{ $product->unit_price }}"/>
                                <span>円</span>
                            </div>
                            <div class="content-quantity">
                                <lavel>数量</lavel>
                                 <input type="number" name="product[quantity]" placeholder="{{ $product->quantity }}"/>
                            </div>
                            <div class="submit-btn">
                                <input type="submit" value="変更">
                            </div>
                        </form>
                    </div>
                        <div class="back-btn">
                            <a href="/">一覧に戻る</a>
                        </div>
                   
        </x-app-layout>
    </body>
</html>
