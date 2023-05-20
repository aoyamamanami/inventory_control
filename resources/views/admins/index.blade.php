<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>在庫管理システム</title>
        <!--Fonts-->
        <link href="https://fonts/googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h2>在庫一覧</h2>
        <table>
                <div class='products'>
                    <tr>
                        <th>商品ID</th>
                        <th>カテゴリーID</th>
                        <th>商品名</th>
                        <th>在庫数</th>
                        <th>登録日</th>
                        <th>ユーザーID</th>
                    </tr>
                    @foreach ($products as $product)
                        <tr>
                            <div class='product'>
                                <td class="id">{{ $product->id }}</td>
                                <td class="category_id">{{ $product->category_id }}</td>
                                <td class="name">{{ $product->name }}</td>
                                <td class="quantity">{{ $product->quantity }}</td>
                                <td class="created_at">{{ $product->created_at }}</td>
                                <td class="user_id">{{ $product->user_id }}</td>
                            </div>
                        </tr>
                    @endforeach
                </div>
        </table>
            <a href='/admins/create'>新規登録</a>
            <div class='paginate'>
                {{ $products->links() }}
            </div>  
    </body>
</html>