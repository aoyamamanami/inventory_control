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
            <h2>在庫一覧編集画面</h2>
            </x-slot>
            <ul>
                <li>
                    <h3>ユーザー：{{ Auth::user()->name }}</h3>
                </li>
                <li>
                    <div class="form-about">
                        <form action="{{ route('edit') }}" method="GET">
                            @csrf
                            <input type="text" name="keyword" value="{{ $keyword }}" placeholder="すべての商品から探す">
                            <img class="placeholder_img" src="https://sato-icons.com/wp/wp-content/uploads/2020/09/%E6%A4%9C%E7%B4%A2%E3%82%A2%E3%82%A4%E3%82%B3%E3%83%B3.png" alt="検索アイコン">
                        </form>
                    </div>
                </li>
            </ul>
            <table>
                <div class='products'>
                    <tr>
                        <th>商品ID</th>
                        <th>カテゴリー</th>
                        <th>商品名</th>
                        <th>在庫数</th>
                        <th>登録日</th>
                        <th>ユーザーID</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <div class='product'>
                                <td class="id">{{ $product->id }}</td>
                                <td class="category_id">
                                    <a href="">{{ $product->category->name }}</a></td>
                                <td class="name">{{ $product->name }}</td>
                                <td class="quantity">{{ $product->quantity }}</td>
                                <td class="created_at">{{ $product->created_at }}</td>
                                <td class="user_id">{{ $product->user_id }}</td>
                            </div>
                        </tr>
                    @endforeach
                </div>
            </table>
               <input type="submit" value="登録"/>
        </form>   
        <div class="footer">
            <a href="/">戻る</a>
        </div>
            <div class='paginate'>
                {{ $products->links() }}
            </div>  
        </x-app-layout>
    </body>
</html>