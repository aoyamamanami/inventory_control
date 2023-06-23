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
                    {{ __("You're logged in!") }}
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text p-6 text-gray-900">
                    {{ __("これは在庫管理サイトです。") }}
                </div>
                <div class="text p-6 text-gray-900">
                    {{ __("こちら廃品回収車です。") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
