        <x-app-layout>
            <x-slot name="head">
                <link rel="stylesheet" href="{{ asset('/css/create.css') }}">    
            </x-slot>
            <x-slot name="header">
                在庫数グラフ
            </x-slot>
                    <div class="back-btn">
                        <a href="/">一覧に戻る</a>
                    </div>　

            <div id="chartContainer">
                @foreach($chartData as $productId => $data)
                    <canvas id="chart-{{ $productId }}"></canvas>
                @endforeach
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="{{ asset('/js/chart.js') }}"></script>
            <script id="chartData" type="application/json">
                {!! json_encode($chartData) !!}
            </script>
            <script>
                var chartData = @json($chartData);
            </script>
        </x-app-layout>
