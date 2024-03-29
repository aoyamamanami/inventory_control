<x-app-layout>
        <x-slot name="head">
            <link rel="stylesheet" href="{{asset('/css/index.css')}}"> 
        </x-slot>
            <x-slot name="header">
                <h2>在庫一覧</h2>
            </x-slot>
                    <div class="category-nav">
                        <div class="form-about">
                                <form action="{{ route('index') }}" method="GET">
                                    @csrf
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <input type="text" name="keyword" value="{{ $keyword }}" class="form-inner" placeholder="すべての商品から探す">
                                </form>
                        </div>
                        <ul class="category-btn">
                                <li><a class="btn" href="/">すべて</a></li>
                            @foreach ($categories as $category)
                                <li><a class="btn" href="{{ route('index', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
                            @endforeach
                            
                        </ul>
                    </div>
            <table>
                <div class='products'>
                    <tr>
                        <th>商品コード</th>
                        <th>カテゴリー</th>
                        <th>会社名</th>
                        <th>商品名</th>
                        <th>単価</th>
                        <th>在庫数</th>
                        <th>登録日</th>
                        <th>編集</th>
                        <th>削除</th></th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <div class='product'>
                                <td class="product_code">{{ $product->product_code }}</td>
                                <td class="category_id">
                                    <a href="">{{ $product->category->name }}</a></td>
                                <td class="company">{{ $product->company }}</td>
                                <td class="name">{{ $product->name }}</td>
                                <td class="unit_price">{{ $product->unit_price }}</td>
                                <td class="quantity">{{ $product->quantity }}</td>
                                <td class="created_at">{{ $product->created_at->format('Y/m/d') }}</td>
                                <td class="edit_link">
                                    <a href="/products/{{ $product->id }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td class="delete_button">
                                    <form action="/products/{{ $product->id }}" id="form_{{ $product->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deleteProduct({{ $product->id }})"><i class="fa-regular fa-trash-can"></i></button>
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
                <a href='/products/create' class="btn-create">新規登録</a>
        </x-app-layout>
        <script>
            function deleteProduct(id){
            'use strict'
            
            if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
