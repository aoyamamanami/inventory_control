<x-app-layout>
        <x-slot name="head">
            <link rel="stylesheet" href="{{asset('/css/create.css')}}"> 
        </x-slot>
            <x-slot name="header">
                <h2>メモ新規登録画面</h2>
            </x-slot>
                <div class="remarks-form-about">
                    <form action="/remarks" method="POST">
                        @csrf
                        <div class="remarks-body">
                            <textarea name="remarks[body]" placeholder="メモ"></textarea>
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