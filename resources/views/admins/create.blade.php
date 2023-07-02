    <x-app-layout>
        <x-slot name="head">
            <link rel="stylesheet" href="{{asset('/css/create.css')}}">    
        </x-slot>
            <x-slot name="header">
                新規登録
            </x-slot>
                <div class="form-list">
                    <form action="/products" method="POST">
                        @csrf
                            <div class="input-row category_id">
                                    <select name="product[category_id]">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="input-row product_code">
                                <h2>商品コード</h2>
                                <input type="number" name="product[product_code]" value>
                                    @error('product.product_code')
                                    <p class="error">同じ商品コードは使用できません。</p>
                                    @enderror
                            </div>
                            <div class="input-row company">
                                <h2>会社名</h2>
                                <input type="text" name="product[company]" value>
                            </div>
                            <div class="input-row name">
                                <h2>商品名</h2>
                                <input type="text" name="product[name]" value>
                            </div>
                            <div class="input-row unit_price">
                                <h2>単価</h2>
                                <input type="number" name="product[unit_price]" value>
                                <span>円</span>
                            </div>
                            <div class="input-row quantity">
                                <h2>発注数</h2>
                                <input type="number" name="product[quantity]" value>
                            </div>
                            <div class="submit-btn">
                                <input type="submit" value="登録"/>
                            </div>
                </div>
            </form>   
        <div class="back-btn">
            <a href="/">一覧に戻る</a>
        </div>
    </x-app-layout>
