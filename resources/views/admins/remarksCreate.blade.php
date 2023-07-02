<x-app-layout>
        <x-slot name="head">
            <link rel="stylesheet" href="{{asset('/css/index.css')}}"> 
        </x-slot>
            <x-slot name="header">
                <h2>メモ新規登録画面</h2>
            </x-slot>
                <div class="form">
                    <form action="/remarks" method="POST">
                        @csrf
                        <div class="form-about">
                            <input type="text" name="remarks[body]" value>
                        </div>
                        <div class="submit-btn">
                            <input type="submit" value="登録"/>
                        </div>
                    </form>
                </div>
            <div class="back-remarks back-btn">
                <a href="/remarks/remark">戻る</a>
            </div>
</x-app-layout>