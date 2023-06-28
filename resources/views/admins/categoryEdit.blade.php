        <x-app-layout>
            <x-slot name="head">
                <link rel="stylesheet" href="{{asset('/css/create.css')}}">    
            </x-slot>
            <x-slot name="header">
                <h2>カテゴリー編集</h2>
            </x-slot>
                    @foreach($categories as $category)
                        <div class="categories-wrapper">
                            <h2 class="categories">・{{ $category->name }}</h2>
                                <div class="delete-btn">
                                    <form action="/categories/{{ $category->id }}" id="form_{{ $category->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deleteCategory({{ $category->id }})"><i class="fa-regular fa-trash-can"></i></button>
                                    </form>
                                </div>
                        </div>
                    @endforeach
                    
                    <div class="categoryCreate">
                        <div class="form-list">
                            <form action="/categories" method="POST">
                                @csrf
                                <div class="input-row category-name">
                                    <h2>カテゴリー新規登録</h2>
                                    <input type="text" name="category[name]" value>
                                </div>
                                <div class="submit-btn category">
                                    <input type="submit" value="登録"/>
                                </div>
                            </form>
                        </div>
                    </div>
            <div class="back-btn">
                <a href="/">一覧に戻る</a>
            </div>
        </x-app-layout>
        <script>
            function deleteCategory(id){
            'use strict'
            
            if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
