<x-app-layout>
        <x-slot name="head">
            <link rel="stylesheet" href="{{asset('/css/edit.css')}}">   
        </x-slot>
            <x-slot name="header">
                <h2>在庫編集画面</h2>
            </x-slot>
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
                                <label>単価</label>
                                <input type="number" name="product[unit_price]" placeholder="{{ $product->unit_price }}"/>
                                <span>円</span>
                            </div>
                            <div class="content-quantity">
                                <label>数量</label>
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