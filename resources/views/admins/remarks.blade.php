<x-app-layout>
        <x-slot name="head">
            <link rel="stylesheet" href="{{asset('/css/index.css')}}"> 
        </x-slot>
            <x-slot name="header">
                <h2>メモ</h2>
            </x-slot>
                <div class="remarks-container">
                    <div class="new-remarks">
                        <a href="/remarks/remarksCreate" class="btn-create">新規登録</a>
                    </div>
                    <div class="remarks-list">
                        @foreach($remarks as $remark)
                            <div class="remarks-content">
                                <div class="remarks-text">
                                    <h2 class="remarks">{{ $remark->body }}</h2>
                                </div>
                                <div class="remarks-bottom">
                                        <span class="edit_link">
                                            <a href="/remarks/{{ $remark->id }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                        </span>
                                        <span class="delete_btn">
                                            <form action="/remarks/{{ $remark->id }}" id="form_{{ $remark->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deleteRemark({{ $remark->id }})"><i class="fa-regular fa-trash-can"></i></button>
                                            </form>
                                        </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            <div class="back-btn">
                <a href="/">一覧に戻る</a>
            </div>
</x-app-layout>
        <script>
            function deleteRemark(id){
            'use strict'
            
            if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
 