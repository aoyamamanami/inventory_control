
/*global Chart*/
/*global chartData*/


//  document.addEventListener('DOMContentLoaded', function() {
//     var chartData = JSON.parse(document.getElementById('chartData').textContent);
//     var ctx = document.getElementById('chart').getContext('2d');
//     var chart = new Chart(ctx, {
//         type: 'line',
//         data: {
//             labels: chartData.map(data => data.change_date),
//             datasets: [{
//                 label: '在庫量',
//                 data: chartData.map(data => data.quantity),
//                 backgroundColor: 'rgba(0, 123, 255, 1)',
//                 borderColor: 'rgba(0, 123, 255, 1)',
//                 borderWidth: 1
//             }]
//         },
//         options: {
//             responsive: true,
//         }
//      });
//  });



document.addEventListener('DOMContentLoaded', function() {
    var chartData = JSON.parse(document.getElementById('chartData').textContent);
    var chartContainer = document.getElementById('chartContainer');

    for (var productId in chartData) {
        var canvasId = 'chart-' + productId;
        var ctx = document.getElementById(canvasId).getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: chartData[productId].data.map(data => data.change_date),
                datasets: [{
                    label: chartData[productId].name,
                    data: chartData[productId].data.map(data => data.quantity),
                    backgroundColor: 'rgba(99, 125,150\, 1)',
                    borderColor: 'rgba(99, 125,150, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    }
});