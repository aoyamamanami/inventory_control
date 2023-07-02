<x-app-layout>
        <x-slot name="head">
            <link rel="stylesheet" href="{{asset('/css/index.css')}}"> 
        </x-slot>
            <x-slot name="header">
                <h2>メモ編集画面</h2>
            </x-slot>
                <div class="remarks-edit-container">
                    <form action="/remarks/{{ $remark->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="content-body">
                            <input type="text" name="remarks[body]" value="{{ $remark->body }}">
                        </div>
                        <div class="submit-btn">
                            <input type="submit" value="変更">
                        </div>
                    </form>
                </div>
                <div class="back-remarks back-btn">
                    <a href="/remarks/remark">戻る</a>
                </div>
</x-app-layout>