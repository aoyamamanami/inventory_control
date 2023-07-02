<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text p-6 text-gray-900">
                    {{ __("Thank you for visiting!") }}
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text p-6 text-gray-900">
                    {{ __("こちらは在庫管理アプリです。") }}
                </div>
                <div class="text p-6 text-gray-900">
                    {{ __("グラフ機能は、毎回の在庫量をグラフに表示して、将来の在庫を予測するのに役立ちます。") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
